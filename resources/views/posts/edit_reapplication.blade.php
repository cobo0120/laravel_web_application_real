@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <title>申請入力フォームの作成</title>
    </head>


    <body>
        <div class="container">



            <h2>再申請画面</h2>

            <form method="post" action="{{ route('post.update_reapplication', ['id' => $posts->id]) }}">
                @csrf
                {{-- hiddenでステータスを隠す --}}
                <input class="form-control" type="hidden" name="application_status" value="1">


                {{-- 自動表示 --}}
                <div class="form-group col-1 mb-2">
                    <label class="label">申請No<br></label>
                    <input class="form-control" style="width: 130px" type="text" name=""
                        value="{{ $posts->id }}">
                </div>



                {{-- 自動表示取得 --}}
                <div class="form-group col-1 mb-2">
                    <label class="label">申請日付<br></label>
                    <input class="form-control" style="width: 130px" type="text" name="application_day"
                        value="{{ $posts->application_day }}" style="width: 100px";>
                </div>

                {{-- データベースから取得し表示 --}}
                <div class="form-group col-1 mb-2">
                    <label class="label">部署名<br></label>
                    {{-- @php
           var_dump(auth()->user()->department->department_name);
       @endphp --}}
                    <input class="form-control" style="width: 130px" type="text" name=""
                        value="{{ auth()->user()->department->department_name }}">
                    <input type="hidden" name="department_id" value="{{ auth()->user()->department_id }}">
                    {{-- <input type="hidden" name="department_id" value="2"> --}}
                    </select>
                </div>

                {{-- 自動表示取得 --}}
                <div class="form-group col-2 mb-2">
                    <label class="label">申請者名<br></label>
                    <input class="form-control" style="width: 130px" type="text" name=""
                        value="{{ auth()->user()->name }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                <div class="form-group col-4 mb-2">
                    <label class="label">購入先</label>
                    <input class="form-control" style="width: 250px" type="text" name="purchase"
                        value="{{ old('purchase', $posts->purchase) }}">
                </div>
                <div class="form-group col-6 mb-2">
                    <label class="label">購入先URL</label>
                    <input class="form-control" type="text" name="purchasing_url"
                        value="{{ old('purchasing_url', $posts->purchasing_url) }}">
                </div>
                {{-- テキスト入力 --}}
                <div class="form-group col-6 mb-2">
                    <label class="label">利用目的</label>
                    <input class="form-control" name="purpose_of_use"
                        value="{{ old('purpose_of_use', $posts->purpose_of_use) }}">
                </div>

                {{-- 自動表示 --}}
                <div class="form-group col-2 mb-2">
                    <label class="label">納品希望日</label>
                    <input class="form-control" style="width: 130px" type="date" name="delivery_hope_day"
                        style="width: 125px" value="{{ old('delivery_hope_day', $posts->delivery_hope_day) }}">
                </div>


                {{-- 横並び項目 入力項目を増やすように設定する --}}
                {{-- <form  method="post" action="{{route('item.store')}}">
@csrf --}}
                <div id="table-block" class="center mb-2">
                    <button class="btn btn-outline-info" type="button" id="add-item" value="">購入項目追加</button>
                    <table id="item_table" class="table table-bordered table table-hover">
                        <thead class="table table-info">
                            <tr>
                                <th style="width: 150px;">区分</th>
                                <th>商品名</th>
                                <th style="width: 150px">購入単価</th>
                                <th style="width: 100px;">数量</th>
                                <th style="width: 100px;">単位</th>
                                <th style="width: 100px;">勘定科目</th>
                                <th class="clear-column"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr class="item">
                                    <td>
                                        <select class="form-control" name="consumables_equipment_id[{{ $loop->index }}]"
                                            value="{{ old('consumables_equipment_id', $item->consumables_equipment_id) }}">
                                            @foreach ($consumables as $consumable)
                                                <option value="{{ $consumable->id }}"
                                                    @if ($item->consumables_equipment_id == $consumable->id) selected @endif>
                                                    {{ $consumable->consumables_equipment }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="product_name[{{ $loop->index }}]"
                                            value="{{ old('product_name', $item->product_name) }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-right" size="5"
                                            name="unit_purchase_price[{{ $loop->index }}]" pattern="^[0-9]+$"
                                            value="{{ old('unit_purchase_price', $item->unit_purchase_price) }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-right" size="3"
                                            name="purchase_quantities[{{ $loop->index }}]" pattern="^[0-9]+$"
                                            value="{{ old('purchase_quantities', $item->purchase_quantities) }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-right" size="3"
                                            name="units[{{ $loop->index }}]" value="{{ old('units', $item->units) }}">
                                    </td>
                                    <td>
                                        <select class="form-control" name="account_id[{{ $loop->index }}]"
                                            value="{{ old('accound_id', $item->account_id) }}">
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}"
                                                    @if ($item->account_id == $account->id) selected @endif>
                                                    {{ $account->account }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="clear-column close-icon">✖</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- </form> --}}
                {{-- 横並び項目（ここまで） --}}



                {{-- 金額合計関係（自動計算）算術演算子の設定 --}}
                <div class="form-group col-1 my-4" id="total">
                    <label class="label">小計</label>
                    <input class="form-control text-right" type="text" name="subtotal"
                        value="{{ number_format(old('subtotal', $posts->subtotal), 0, '.', ',') }}" readonly>
                </div>

                <div class="form-group col-1 my-4">
                    <label class="label">消費税</label>
                    <input class="form-control text-right" type="text" name="tax_amount"
                        value="{{ number_format(old('tax_amount', $posts->tax_amount), 0, '.', ',') }}" readonly>
                </div>

                <div class="form-group col-1 my-4">
                    <label class="label font-weight-bold">発注金額合計</label>
                    <input class="form-control text-right" type="text" name="total_amount"
                        value="{{ number_format(old('total_amount', $posts->total_amount), 0, '.', ',') }}" readonly>
                </div>
                {{-- 金額合計関係（ここまで） --}}





                <!-- モーダル機能ボタン -->
                <button type="button" class="btn btn-outline-primary destination" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">送信先検索</button>

                <!-- モーダル機能-->

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">送信先検索</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group col-2 my-4 ">
                                    <input type="search" id="search-input" name="search" class="form-control"
                                        placeholder="氏名検索" value="">
                                    <button id="search-destination" type="button"
                                        class="btn btn-outline-info my-4">検索する</button>
                                </div>


                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>氏名</th>
                                            <th>部署名</th>
                                            <th>メールアドレス</th>
                                            <th>送信先選択</th>
                                        </tr>
                                    </thead>
                                    <tbody id="destination_body"></tbody>
                                </table>

                                <div id="page-nate"></div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 送信先メールアドレスの選択検索機能を設けてアドレスのパラメータを変数に入れてMailableクラスに入れる --}}

                <div class="form-group col-4 my-4">
                    <label for="email">送信先</label>
                    <input id="email" class="form-control choice-email" type="email"
                        value="{{ old('purchase', $posts->destination) }}" name="destination">
                </div>



                {{-- 備考 --}}
                <div class="form-group col-6 mb-4">
                    <label class="label">備考（再申請理由）</label>
                    <input class="form-control" name="remarks" value="{{ $posts->remarks }}">
                </div>

                {{-- 差戻理由 --}}
                <div class="form-group col-6 mb-4">
                    <label class="label">差戻理由</label>
                    <input class="form-control" name="reason_for_remand" value="{{ $posts->reason_for_remand }}"
                        readonly>
                </div>

                {{-- ボタン配置 --}}

                <button type="button" class="btn btn-outline-success btn-lg" style="margin: 100px; width: 150px"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">再申請</button>
                <button type="button" class="btn btn-outline-warning btn-lg" style="margin: 100px; width: 150px"
                    data-bs-toggle="modal" data-bs-target="#example1Modal">キャンセル</button>
                <button type="button" class="btn btn-outline-danger btn-lg" style="margin: 100px; width: 150px"
                    data-bs-toggle="modal" data-bs-target="#example2Modal">取下</button>

                {{-- ボタン配置（ここまで） --}}



                <!-- Modal(承認) -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">申請確認画面</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>再申請します。</strong>よろしいですか？</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">再申請</button></a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal(キャンセル) -->
            <div class="modal fade" id="example1Modal" tabindex="-1" aria-labelledby="example1ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">キャンセル確認画面</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>再申請をキャンセルします。</strong>よろしいですか？</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('posts.index') }}"><button type="button"
                                    class="btn btn-warning">キャンセル</button></a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal(取下) -->
            <div class="modal fade" id="example2Modal" tabindex="-1" aria-labelledby="example2ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">取下確認画面</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>申請を取下します。</strong>よろしいですか？</p>
                        </div>
                        <div class="modal-footer">
                            {{-- 取下のメールを作成しないと --}}
                            <form method="post"
                                action="{{ route('post.destroy_reapplication', ['post_id' => $posts->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">取下</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{ asset('/js/applicant.js') }}"></script>
            <script type="module" src="{{ asset('/js/destination.js') }}"></script>
        </div>

        <div class="container mt-5">
            <footer>
                <p>&copy; WEB申請アプリ All rights reserved.</p>
            </footer>
        </div>
    </body>

    </html>
@endsection
