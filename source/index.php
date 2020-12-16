<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | index</title>

  <?php include_once('./link.html'); ?>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <style>
      .hm-gradient {
        background: linear-gradient(40deg, rgba(0, 51, 199, .3), rgba(209, 149, 249, .3));
      }

      .heading {
        margin: 0 6rem;
        font-size: 3.8rem;
        font-weight: 700;
        color: #5d4267;
      }

      .subheading {
        margin: 2.5rem 6rem;
        color: #bcb2c0;
      }

      .btn.btn-margin {
        margin-left: 6rem;
        margin-top: 3rem;
      }

      .btn.btn-lily {
        background: linear-gradient(40deg, rgba(0, 51, 199, .7), rgba(209, 149, 249, .7));
        color: #fff;
      }

      .title {
        margin-top: 6rem;
        margin-bottom: 2rem;
        color: #5d4267;
      }

      .subtitle {
        color: #bcb2c0;
        margin-left: 20%;
        margin-right: 20%;
        margin-bottom: 6rem;
      }
    </style>

    <div class="contents">
      <div class="container my-5">

        <!-- Section -->
        <section>
          <!-- タイトル -->
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">top</h6>
          <h3 class="font-weight-bold text-center dark-grey-text pb-2">トップページ</h3>
          <hr class="w-header my-4">
        </section>
      </div>
    <!-- Main navigation -->
    <header>
      <!-- Intro -->
      <section class="view">

        <div class="row">

          <div class="col-md-6">

            <div class="d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="heading">Welcome To Aquarium</h1>
              <h4 class="subheading font-weight-bold">熱帯魚のオンライン販売専門店です</h4>
              <div class="mr-auto">
                <button type="button" class="btn btn-lily btn-margin btn-rounded">Use started <i class="fas fa-caret-right ml-3"></i></button>
              </div>
            </div>

          </div>

          <div class="col-md-6">

            <div class="view">
              <img src="https://images.pexels.com/photos/325045/pexels-photo-325045.jpeg" class="img-fluid" alt="smaple image">
              <div class="mask flex-center hm-gradient">
              </div>
            </div>

          </div>

        </div>

      </section>
      <!-- Intro -->

    </header>
    <!-- Main navigation -->
  </div>


  <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>
</body>

</html>