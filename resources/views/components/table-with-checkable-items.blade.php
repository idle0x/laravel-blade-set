@props(['items' => [], 'headerItems' => [], 'checkable' => true, 'checked' => [], 'checkableId' => 'id', 'withActionButtons' => true, 'checkableButtons' => [], 'checkRoute' => '', 'resetRoute' => '', 'checkedDeleteRoute' => null])
<div class="card card-primary content">
    <div class="card-header">
        <h3 class="card-title">Фильтр</h3>
    </div>
    {{ $filters ?? null }}
</div>
@if(($checkable))
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Действия</h3>
                </div>
                <div class="card-body">
                    <div>
                        <form class="d-inline" role="form"
                              method="post"
                              action="{{ $resetRoute }}">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-secondary"
                                id="buttonReset"
                                {{ empty($checked) ? 'disabled' : null }}
                            >
                                {{ 'Сбросить выбранные' }}
                            </button>

                            <div>
                                <span>Выбрано:</span>
                                <span id="countContainer">{{ count($checked) }}</span>
                            </div>
                        </form>
                    </div>
                    <div>
                        @if(isset($checkableButtons['download_checked']))
                            <a
                                href="{{ $checkableButtons['download_checked']['route'] }}"
                                class="btn btn-primary {{ empty($checked) ? 'disabled' : null }}"
                                id="download_checked"
                                download
                            >
                                {{ $checkableButtons['download_checked']['title'] ?? 'Скачать выбранные' }}
                            </a>
                        @endif
                        @if(isset($checkableButtons['download_my']))
                            <a
                                href="{{ $checkableButtons['download_my']['route'] }}"
                                class="btn btn-primary"
                                download
                            >
                                {{ $checkableButtons['download_my']['title'] ?? 'Скачать все мои' }}
                            </a>
                        @endif
                        @if(isset($checkableButtons['download_all']))
                            <a
                                href="{{ $checkableButtons['download_all']['route'] }}"
                                class="btn btn-primary"
                                download
                            >
                                {{ $checkableButtons['download_all']['title'] ?? 'Скачать все' }}
                            </a>
                        @endif
                        <button
                            class="btn btn-primary"
                            id="check_all_on_page"
                            {{ !collect($items)->where('checkable', true)->count() ? 'disabled' : null }}
                        >
                            Выбрать все на странице
                        </button>
                        @if($checkedDeleteRoute)
                            <form
                                class="js-confirm-delete d-inline" role="form"
                                method="post"
                                action="{{ $checkedDeleteRoute }}"
                                aria-labelledby="destroy-checked-element"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                    id="buttonCheckedDelete"
                                    {{ empty($checked) ? 'disabled' : null }}
                                >
                                    {{ 'Удалить выбранные' }}
                                </button>
                            </form>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="card-tools">
            {{ $toolsFilter ?? null }}
        </div>
    </div>

    @if(!empty($items))
        <div class="card-body p-0 table-responsive responsive">
            <table class="table table-striped projects" aria-describedby="table-actions-items">
                <thead>
                    <tr>
                        @if($checkable)
                            <th></th>
                        @endif
                        @foreach($headerItems as $item)
                            <th {{ $item === 'id' ? 'style="width: 1%"' : null }}>
                                {{ $item }}
                            </th>
                        @endforeach
                        @if($withActionButtons)
                            <th style="
                                width: 200px !important;
                                display: inline-block;
                                border: none;
                            ">
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            @if($checkable && isset($item['checkable']) && $item['checkable'])
                                <td>
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="checkbox_item_{{ $item[$checkableId] }}"
                                            name="checkable_item[]"
                                            value="{{ $item[$checkableId] }}"
                                            {{ in_array($item[$checkableId], $checked) ? 'checked' : null }}
                                        >
                                    </div>
                                </td>
                            @endif
                            @foreach($headerItems as $header)
                                <td>
                                    {{-- @if(gettype($item[$header['code']]) === 'array' && $item[$header['code']]['type'] === 'boolean')
                                        <x-bool
                                            :value="$item[$header['code']]['value']"
                                            :classTrue="$item[$header['code']]['classTrue']"
                                            :classFalse="$item[$header['code']]['classFalse']"
                                        />
                                    @else --}}
                                        {{ $header }}
                                    {{-- @endif --}}
                                </td>
                            @endforeach
                            @if($withActionButtons)
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ $item['route_edit'] ?? '' }}">
                                        <em class="fas fa-pencil-alt"></em>
                                    </a>
                                    <form class="js-confirm-delete d-inline" role="form"
                                          method="post" action="{{ $item['route_delete'] ?? '' }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <em class="fas fa-trash"></em>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        {{-- @include('components.empty-result') --}}
    @endif
    @push('scripts')
        <script>
            let token = "{{ csrf_token() }}";
            let items = @json(collect($items)->where('checkable', true)->map(fn ($item) => ['id' => $item['id'], 'state' => 1]));
            let amount = @json(count($checked));
            $(document).ready(function() {
                const innerTextAmountContainer = (text) => $('#countContainer').text(text);
                const toggleDisableProp = (element, state) => {
                    if (Object.keys($(element)).length > 0) {
                        if ($(element).prop('tagName').toLowerCase() === 'a') {
                            if (state) {
                                $(element).addClass('disabled');
                            } else {
                                $(element).removeClass('disabled');
                            }
                        } else {
                            $(element).prop('disabled', state);
                        }
                    }
                };
                const toggleDisableProps = (array, state) => array.forEach((element) => toggleDisableProp(element, state));
                const onPending = () => {
                    toggleDisableProps([
                        '#buttonReset',
                        '#download_checked',
                        '#check_all_on_page',
                        '#buttonCheckedDelete',
                        '[name="checkable_item[]"]',
                    ], true);
                    innerTextAmountContainer('');
                };
                const onFinished = () => {
                    toggleDisableProps([
                        '#check_all_on_page',
                        '[name="checkable_item[]"]',
                    ], false);
                    innerTextAmountContainer(amount);
                }

                const success = (data) => {
                    token = data.token;
                    amount = data.amount;
                    if (!amount) {
                        toggleDisableProps([
                            '#buttonReset',
                            '#download_checked',
                            '#buttonCheckedDelete',
                        ], true);
                    } else {
                        toggleDisableProps([
                            '#buttonReset',
                            '#download_checked',
                            '#buttonCheckedDelete',
                        ], false);
                    }
                    onFinished();
                    $('[name="checkable_item[]"]').each(function() {
                        if (data.checked.includes(+$(this).val())) {
                            $(this).prop('checked', true);
                        }
                    });
                };
                $('[name="checkable_item[]"]').click((e) => {
                    const checkbox = $(e.target);
                    onPending();
                    $.ajax({
                        type: 'POST',
                        url: "{{ $checkRoute }}",
                        data: {
                            _token: token,
                            target: [{ id: checkbox.val(), state: +checkbox.is(':checked') }]
                        },
                        success,
                        error: () => {
                            checkbox.prop('checked', !checkbox.is(':checked'));
                            onFinished();
                            alert('Произошла непредвиденная ошибка');
                        }
                    });
                });
                $('#check_all_on_page').click(() => {
                    onPending();
                    $.ajax({
                        type: 'POST',
                        url: "{{ $checkRoute }}",
                        data: {
                            _token: token,
                            target: items,
                        },
                        success,
                        error: () => {
                            onFinished();
                            alert('Произошла непредвиденная ошибка');
                        }
                    });
                });
            });
        </script>
    @endpush
    {{-- @include('layouts.assets.confirm_delete') --}}
</div>
