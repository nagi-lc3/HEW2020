<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | カート</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>

    <!-- メインコンテンツ -->
    <div class="contents">
      <div class="container my-5 py-3 z-depth-1 rounded">

        <!--Section: Content-->
        <section class="dark-grey-text">

          <!-- Shopping Cart table -->
          <div class="table-responsive">

            <table class="table product-table mb-0">

              <!-- Table head -->
              <thead class="mdb-color lighten-5">
                <tr>
                  <th></th>
                  <th class="font-weight-bold">
                    <strong>商品名</strong>
                  </th>
                  <th class="font-weight-bold">
                    <strong>数量</strong>
                  </th>
                  <th class="font-weight-bold">
                    <strong>価格</strong>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <!-- /.Table head -->

              <!-- Table body -->
              <tbody>

                <!-- First row -->
                <tr>
                  <th scope="row">
                    <img src="images/fish1.jpg" alt="" class="img-fluid z-depth-0">
                  </th>
                  <td>
                    <h5 class="mt-3">
                      <strong>エンゼルフィッシュ</strong>
                    </h5>
                  </td>
                  <td>
                    <input type="number" value="2" aria-label="Search" class="form-control ryou">
                  </td>
                  <td class="font-weight-bold">
                    <strong>￥800</strong>
                  </td>
                  <td class="pl-0">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Remove item">X
                    </button>
                  </td>
                </tr>
                <!-- /.First row -->

                <!-- Second row -->
                <tr>
                  <th scope="row">
                    <img src="images/fish3.jpg" alt="" class="img-fluid z-depth-0">
                  </th>
                  <td>
                    <h5 class="mt-3">
                      <strong>プレコ</strong>
                    </h5>
                  </td>
                  <td>
                    <input type="number" value="2" aria-label="Search" class="form-control ryou">
                  </td>
                  <td class="font-weight-bold">
                    <strong>￥600</strong>
                  </td>
                  <td class="pl-0">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Remove item">X
                    </button>
                  </td>
                </tr>
                <!-- /.Second row -->

                <!-- Third row -->
                <tr>
                  <th scope="row">
                    <img src="images/fish2.jpg" alt="" class="img-fluid z-depth-0">
                  </th>
                  <td>
                    <h5 class="mt-3">
                      <strong>コリドラスパンダ</strong>
                    </h5>
                  </td>
                  <td>
                    <input type="number" value="2" aria-label="Search" class="form-control ryou">
                  </td>
                  <td class="font-weight-bold">
                    <strong>￥1,200</strong>
                  </td>
                  <td class="pl-0">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Remove item">X
                    </button>
                  </td>
                </tr>
                <!-- /.Third row -->

                <!-- Fourth row -->
                <tr>
                  <td>
                    <h4 class="mt-2 nav justify-content-end pr-5">
                      <strong>Total</strong>
                    </h4>
                  </td>
                  <td>
                    <h4 class="mt-2">
                      <strong>￥2,600</strong>
                    </h4>
                  </td>
                  <td colspan="3">
                    <button type="button" class="btn btn-primary btn-rounded">レジに進む
                      <i class="fas fa-angle-right right"></i>
                    </button>
                  </td>
                </tr>
                <!-- Fourth row -->

              </tbody>
              <!-- /.Table body -->

            </table>

          </div>
          <!-- /.Shopping Cart table -->

        </section>
        <!--Section: Content-->


      </div>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>