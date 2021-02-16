<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 注文</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <div class="container my-5">

        <!-- Section -->
        <section>
          <!-- タイトル -->
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">order</h6>
          <h3 class="font-weight-bold text-center white-text pb-2">注文</h3>
          <hr class="w-header white my-4">

          <div class="container mt-5">


            <!--Section: Content-->
            <section class="dark-grey-text">

              <div class="card">
                <div class="card-body">

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-8">

                      <!-- Pills navs -->
                      <ul class="nav md-pills nav-justified pills-primary font-weight-bold">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#tabCheckoutBilling123" role="tab">1. 注文者</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#tabCheckoutAddons123" role="tab">2. 商品</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#tabCheckoutPayment123" role="tab">3. お支払</a>
                        </li>
                      </ul>

                      <!-- Pills panels -->
                      <div class="tab-content pt-4">

                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="tabCheckoutBilling123" role="tabpanel">

                          <!--Card content-->
                          <form>

                            <!--Grid row-->
                            <div class="row">

                              <!--Grid column-->
                              <div class="col-md-6 mb-4">

                                <!--姓-->
                                <label for="firstName" class="">姓</label><span class="badge badge-danger ml-1 ">必須</span></small>
                                <input type="text" id="firstName" class="form-control">

                              </div>
                              <!--Grid column-->

                              <!--Grid column-->
                              <div class="col-md-6 mb-2">

                                <!--名-->
                                <label for="lastName" class="">名</label><span class="badge badge-danger ml-1 ">必須</span></small>
                                <input type="text" id="lastName" class="form-control">

                              </div>
                              <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--住所-->
                            <label for="address" class="">配送先住所</label><span class="badge badge-danger ml-1 ">必須</span></small>
                            <input type="text" id="address" class="form-control mb-4" placeholder="東京都新宿区〇〇3－2">

                            <!--住所2-->
                            <label for="address" class="">それ以降の住所</label>
                            <input type="text" id="address-2" class="form-control mb-4" placeholder="ビル名 or マンション名">

                            <!--メールアドレス-->
                            <label for="email" class="">メールアドレス</label><span class="badge badge-danger ml-1 ">必須</span></small>
                            <input type="email" id="email" class="form-control mb-4" placeholder="email@example.com">

                            <!--電話番号-->
                            <label for="phone" class="">電話番号</label><span class="badge badge-danger ml-1 ">必須</span></small>
                            <input type="tel" id="phone" class="form-control mb-4" placeholder="080-1111-0000">

                            <hr>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">次へ</button>


                          </form>

                        </div>
                        <!--/.Panel 1-->

                        <!--Panel 2-->
                        <div class="tab-pane fade" id="tabCheckoutAddons123" role="tabpanel">

                          <!--Grid row-->
                          <div class="row">
                            <!--Grid column-->
                            <div class="col-md-5 mb-4">
                              <img src="images/fish2.jpg" alt="fish2" class="img-fluid z-depth-1-half" alt="Second sample image">
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-7 mb-4">
                              <h5 class="mb-3 h5">プレコ</h5>
                              <p>￥2,000</p>
                            </div>
                            <!--Grid column-->
                          </div>
                          <!--Grid row-->

                          <hr class="mb-5">

                          <!--Grid row-->
                          <div class="row">
                            <!--Grid column-->
                            <div class="col-md-5 mb-4">
                              <img src="images/fish1.jpg" alt="fish1" class="img-fluid z-depth-1-half" alt="Second sample image">
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-7 mb-4">
                              <h5 class="mb-3 h5">グッピー</h5>
                              <p>￥1,500</p>
                            </div>
                            <!--Grid column-->
                          </div>
                          <!--Grid row-->

                          <hr class="mb-5">

                          <!--Grid row-->
                          <div class="row">
                            <!--Grid column-->
                            <div class="col-md-5 mb-4">
                              <img src="images/fish4.jpg" alt="fish1" class="img-fluid z-depth-1-half" alt="Second sample image">
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-7 mb-4">
                              <h5 class="mb-3 h5">サカナ</h5>
                              <p>￥1,500</p>
                            </div>
                            <!--Grid column-->
                          </div>
                          <!--Grid row-->

                          <hr class="mb-4">

                          <button class="btn btn-primary btn-lg btn-block" type="submit">次へ</button>

                        </div>
                        <!--/.Panel 2-->

                        <!--Panel 3-->
                        <div class="tab-pane fade" id="tabCheckoutPayment123" role="tabpanel">

                          <div class="d-block my-3">
                            <div class="mb-2">
                              <input name="group2" type="radio" class="form-check-input with-gap" id="radioWithGap4" checked required>
                              <label class="form-check-label" for="radioWithGap4">クレジットカード</label>
                            </div>
                            <div class="mb-2">
                              <input name="group2" type="radio" class="form-check-input with-gap" id="radioWithGap5" required>
                              <label class="form-check-label" for="radioWithGap5">代引き</label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="cc-number123">クレジットカード番号</label>
                              <input type="text" class="form-control" id="cc-number123" placeholder="" required>
                              <div class="invalid-feedback">
                                Credit card number is required
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-3 mb-3">
                              <label for="cc-expiration123">Expiration</label>
                              <input type="text" class="form-control" id="cc-expiration123" placeholder="" required>
                              <div class="invalid-feedback">
                                Expiration date required
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <label for="cc-cvv123">CVV</label>
                              <input type="text" class="form-control" id="cc-cvv123" placeholder="" required>
                              <div class="invalid-feedback">
                                Security code required
                              </div>
                            </div>
                          </div>
                          <hr class="mb-4">


                        </div>
                        <!--/.Panel 3-->

                      </div>
                      <!-- Pills panels -->


                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 mb-4">

                      <button onclick="location.href='order_complete.php'" class="btn btn-primary btn-lg btn-block" type="submit">注文確定</button>

                      <!--Card-->
                      <div class="card z-depth-0 border border-light rounded-0">

                        <!--Card content-->
                        <div class="card-body">
                          <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">注文内容</h4>

                          <hr>

                          <dl class="row">
                            <dd class="col-sm-8">
                              プレコ
                            </dd>
                            <dd class="col-sm-4">
                              ￥2,000
                            </dd>
                          </dl>

                          <hr>

                          <dl class="row">
                            <dd class="col-sm-8">
                              グッピー
                            </dd>
                            <dd class="col-sm-4">
                              ￥2,000
                            </dd>
                          </dl>

                          <hr>

                          <dl class="row">
                            <dd class="col-sm-8">
                              サカナ
                            </dd>
                            <dd class="col-sm-4">
                              ￥1,500
                            </dd>
                          </dl>

                          <hr>

                          <dl class="row">
                            <dt class="col-sm-8">
                              合計
                            </dt>
                            <dt class="col-sm-4">
                              ￥5,500
                            </dt>
                          </dl>
                        </div>

                      </div>
                      <!--/.Card-->



                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                </div>
              </div>

            </section>
            <!--Section: Content-->


          </div>

        </section>
      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>