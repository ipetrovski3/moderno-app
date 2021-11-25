@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Во Кошничка</span>
                    <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($cart_items as $item)
                        <li id={{ $item->rowId }}
                            class="list-group-item d-flex justify-content-between lh-condensed products">
                            <div>
                                <h5 class="my-0" data-value="{{ $item->rowId }}">{{ $item->name }}</h6>
                                    <p>
                                        <small class="text-muted">Количина: </small> <small>{{ $item->qty }}</small>
                                        @if ($item->options['size'] != '0')
                                            <small class="text-muted">Големина:
                                                {{ strtoupper($item->options['size']) }}</small>
                                        @endif
                                    </p>
                            </div>
                            <div class="py-3">
                                <span class="text-muted">Ед Цена: </span> <span> {{ $item->price }}</span>
                                <span>
                                    <button id="remove_item" data-rowid="{{ $item->rowId }}"
                                        class="btn text-danger delete-item"><i class="fas fa-2x fa-times"></i></button>
                                </span>
                            </div>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between bg-primary" style="color: white">
                        <span>Вкупен износ:</span>
                        <span id="total" data-total="{{ str_replace(',', '', Cart::total()) }}">{{ Cart::total() }}
                            ден</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-primary" style="color: white">
                        <span>Карго:</span>
                        130.00 ден
                    </li>
                    <hr>
                    <li class="list-group-item d-flex justify-content-between bg-primary" style="color: white">
                        <span>Тотал: </span>
                        @php
                            $sum = str_replace(',', '', Cart::total());
                        @endphp
                        <strong id="total_price">{{ floatval($sum) + 130 }} ден</strong>
                    </li>


                </ul>
            </div>

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Податоци за нарачката</h4>
                <form class="needs-validation" action="{{ route('store.order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Име</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Презиме</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value=""
                                required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone"> Телефон </label>
                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="+3897">
                    </div>

                    <div class="mb-3">
                        <label for="email">Емаил адреса </label>
                        <input type="email" name="email" class="form-control" id="email">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Адреса за испорака</label>
                        <input type="text" name="address" class="form-control" id="address"
                            placeholder="Ул. Македонија бр. 33" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="town">Град</label>
                            <select class="form-select d-block w-100" name="town" id="town" required>
                                <option value="">Изберете</option>
                                @foreach (Helpers::towns() as $town)
                                    <option value="{{ $town }}">{{ $town }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="zip">Поштенски број</label>
                            <input type="text" name="post" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="note">Забелешка <small class="text-muted"> (Доколку имате дополнителни барања,
                                    наведете ги во забелешката)</small> </label>
                            <textarea type="text" name="note" class="form-control" id="note"></textarea>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="receive_promotions" value="1" checked id="promotions">
                            <label for="promotions">Се согласувам да добивам емаилови за попусти</label>
                        </div>

                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Плаќање</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked
                                required>
                            <label class="custom-control-label" for="credit">На Врата</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="debit">Картичка <small>(Моментално оваа услуга е
                                    недостапна)</small></label>
                        </div>

                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Потврди ја нарачката</button>
                </form>
                <div hidden>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Име и презиме</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Целосното име од картичката</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Број на кредитна картичка</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Важност</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">(CVV) број</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mb-4">
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.delete-item').on('click', this, function() {
                let rowId = $(this).data('rowid')
                let price = parseInt($('#total').data('total'))
                let price_string = $('#total').text()
                let price_integer = parseFloat(price_string.replace(/,/g, ''))

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name=_token]').val()
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('remove_from_cart') }}",
                    data: {
                        rowId
                    },
                    success: function(data) {
                        let getRow = '#' + data['rowId']
                        let testing = (price - parseInt(data['price']))
                        $('#total').text(price_integer - parseInt(data['price']))
                        $('#total_price').data('total', testing)
                        $('#total_price').text((price_integer - parseInt(data['price']) + 130)
                            .toLocaleString("en-US") + '.00' + ' ден')
                        $(getRow).remove()
                        $('#cartCounter').text(data['count'])
                    }
                })
            })
        })
    </script>
@endsection
