<?php
session_start();
require './db_connect.php';

// ログインしていない場合
if ($_SESSION['user_name'] == false) {
  header('Location: ./login.php');
}

// aquarium_id取り出し
$user_id = $_SESSION['user_id'];
$existence_check_sql = "SELECT aquarium_id FROM my_aquariums INNER JOIN users ON my_aquariums.user_id = users.user_id WHERE users.user_id = :user_id";
try {
  $existence_check_stmt = $pdo->prepare($existence_check_sql);
  $existence_check_stmt->bindParam(':user_id', $user_id);
  $existence_check_stmt->execute();
  $existence_check = $existence_check_stmt->fetch();
} catch (PDOException $e) {
  echo $e;
}


if ($existence_check == true) {
  // aquarium_idがあった場合
  $aquarium_id = $existence_check['aquarium_id'];
  // aquarium_idをもとにcsvへのパス取り出し
  $to_csv_sql = "SELECT aquarium_3D FROM aquariums WHERE aquarium_id = :aquarium_id";
  try {
    $to_csv_stmt = $pdo->prepare($to_csv_sql);
    $to_csv_stmt->bindParam(':aquarium_id', $aquarium_id);
    $to_csv_stmt->execute();
    $to_csv = $to_csv_stmt->fetch();
  } catch (PDOException $e) {
    echo $e;
  }

  // csvファイルへのパス
  $msg = '';
  $path_to_csv = $to_csv['aquarium_3D'];
} else {
  // aquarium_idがない場合
  $msg = '<p>まだ水槽がありません<br><a href="./aquarium_create.php">水槽を作成する</a><p>';
  $path_to_csv = '';
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 水槽1</title>

  <?php include_once('./link.html'); ?>
  <script type="text/javascript" src="./threejs/three.js"></script>
  <script type="text/javascript" src="./threejs/stats.js"></script>
  <script type="text/javascript" src="./threejs/dat.gui.js"></script>
  <script type="text/javascript" src="./threejs/OrbitControls.js"></script>
  <script type="text/javascript" src="./threejs/ColladaLoader.js"></script>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>
    <!-- メインコンテンツ -->
    <div class="contents">
      <!-- <h2>水槽1</h2> -->
      <!-- <p>ビューモード。この辺はレイアウト良く分からんのでモデリングの人に任せる</p> -->
      <?php
      echo $msg;
      ?>

      <div id="Stats-output">
      </div>
      <div id="WebGL-output">
      </div>


      <!-- <form action="aquarium_edit_1.php" method="post">
                <input type="submit" name="" value="編集する">
            </form> -->
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>

  <script type="text/javascript">
    // シーン(３Dモデルを表示する空間)の定義
    let scene = new THREE.Scene();
    // シーンに地面を定義と設定
    var textureLoader = new THREE.TextureLoader();
    var floorTex = textureLoader.load("./models/floor-wood.jpg");
    plane = new THREE.Mesh(new THREE.BoxGeometry(200, 100, 0.1, 30), new THREE.MeshPhongMaterial({
      // 画像の色味の指定
      color: 0xffffff,
      map: floorTex
    }));
    // plane(地面の部分)の表示する角度，位置の指定
    plane.rotation.x = -0.5 * Math.PI;
    plane.position.x = 0;
    plane.position.y = -13;
    plane.position.z = 0;
    // シーンにplane(地面)を追加する
    scene.add(plane);


    // rendererの設定と表示サイズの指定
    let renderer = new THREE.WebGLRenderer();
    // 空間の背景色の指定
    renderer.setClearColor(new THREE.Color(0xEEEEEE));
    // サイトに表示するサイズの指定
    renderer.setSize(window.innerWidth, window.innerHeight);
    // 影の定義
    renderer.shadowMap.enabled = true;


    // カメラの定義と設定
    let camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
    // カメラの位置の指定
    camera.position.x = 0;
    camera.position.y = 20;
    camera.position.z = 80;
    // camera.position.z = 60;
    // カメラの向きの指定
    camera.lookAt(scene.position);
    // マウスでカメラをコントロール
    let orbit = new THREE.OrbitControls(camera, renderer.domElement);
    // シーンにcamera(カメラ)を追加する
    scene.add(camera);


    // ライト(光)の定義と指定
    // ambiLight(シーン内のオブジェクトを均等に照らすライト)の定義と明るさ指定
    var ambiLight = new THREE.AmbientLight(0x242424);
    scene.add(ambiLight);

    // spotLight(単一の点から一方向に放射され，円錐に発せられるライト)の定義と設定
    let spotLight = new THREE.SpotLight(0xffffff);
    // 位置の指定
    spotLight.position.set(0, 50, 0);
    // 影の設定(spotLightは影が発生する)．今回は発生させる
    spotLight.castShadow = true;
    scene.add(spotLight);


    // rendererの出力をhtmlに追加
    document.getElementById("WebGL-output").appendChild(renderer.domElement);

    // 3DS形式のモデルデータを読み込む
    const loader = new THREE.ColladaLoader();
    // 外部に保存する(csv)情報の配列
    // let 配列名 = [モデル名１, ｘ座標１, ｙ座標１, ｚ座標１, ....];
    // インデックス0はさかなの各種類の個数を保持するために0で埋めておく
    // インデックス1は水草
    // インデックス2は装飾品
    // インデックス3は水槽の情報を保持するために0で埋めておく

    // (index)              種類１   種類２   種類３   種類４
    // さかなの個数              2        3        4        2
    // 水草の個数                3        2        1        5
    // 装飾品の個数              2        1        3        2
    // 水槽の種類   "suiso-sikaku"        0        0        0
    let model_csv = [
      [0, 0, 0, 0],
      [0, 0, 0, 0],
      [0, 0, 0, 0],
      [0, 0, 0, 0]
    ];

    // 水槽モデルの”model.name”を一時保存する変数
    let suiso_name;
    // 水草モデルの”model.name”を一時保存する配列
    let mizukusa_name = [];
    // 装飾品モデルの”model.name”を一時保存する配列
    let sosyoku_name = [];



    //CSVファイルを読み込む関数getCSV()の定義
    function getCSV() {
      var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
      // 追加
      var path_to_csv = '<?php echo $path_to_csv ?>';
      // req.open("get", path_to_csv, true); // アクセスするファイルを指定
      req.open("post", path_to_csv, true); // アクセスするファイルを指定
      req.send(null); // HTTPリクエストの発行
    //   console.log(req);

      // レスポンスが返ってきたらconvertCSVtoArray()を呼ぶ
      req.onload = function() {
        convertCSVtoArray(req.responseText); // 渡されるのは読み込んだCSVデータ
        // console.log(req.responseText);
      }
    }

    // 読み込んだCSVデータを二次元配列に変換する関数convertCSVtoArray()の定義
    function convertCSVtoArray(str) { // 読み込んだCSVデータが文字列として渡される
      let rebuild = [];
      var result = []; // 最終的な二次元配列を入れるための配列
      var tmp = str.split("\n"); // 改行を区切り文字として行を要素とした配列を生成

      // 各行ごとにカンマで区切った文字列を要素とした二次元配列を生成
      for (var i = 0; i < tmp.length; ++i) {
        result[i] = tmp[i].split(',');
      }

      rebuild = rebuild.concat(result);
      // console.log(rebuild);

      let suiso_check = rebuild[3][0];
      reSuiso(suiso_check);


      let sakana_num = rebuild[0][0];
      for (let s = 1; s <= sakana_num; s++) {

        let sakana_check = "sakana-" + s;

        for (let j = 0; j < rebuild.length; j++) {

          if (rebuild[j][0] === sakana_check) {
            reFish();
          }
        }
      }

      let mizukusa_num = rebuild[1][0];
      for (let m = 1; m <= mizukusa_num; m++) {

        let mizukusa_check = "mizukusa-" + m;

        for (let j = 0; j < rebuild.length; j++) {

          if (rebuild[j][0] === mizukusa_check) {
            let mzks_X = rebuild[j][1];
            let mzks_Y = rebuild[j][2];
            let mzks_Z = rebuild[j][3];
            reMizukusa(mzks_X, mzks_Y, mzks_Z);
          }
        }
      }


      let sosyoku_num = rebuild[2][0];
      for (let m = 1; m <= sosyoku_num; m++) {

        let sosyoku_check = "sosyoku-" + m;

        for (let j = 0; j < rebuild.length; j++) {

          if (rebuild[j][0] === sosyoku_check) {
            let ssk_X = rebuild[j][1];
            let ssk_Y = rebuild[j][2];
            let ssk_Z = rebuild[j][3];
            reSosyoku(ssk_X, ssk_Y, ssk_Z);
          }
        }
      }
      // if(rebuild[j][0] === "mizukusa"){
      //   reMizukusa();
      // }

      return rebuild;
    }

    function reSuiso(suiso_check) {
      if (suiso_check === "suiso-sikaku") {
        // 3dsファイルのパスを指定
        loader.load('./models/suiso01.dae', (collada) => {
          // 読み込み後に3D空間に追加
          let model = collada.scene;
          // 表示するサイズを指定
          model.scale.set(5, 5, 5);
          // 表示する位置を指定
          model.position.x = 0;
          model.position.y = 2;
          model.position.z = 0;
          // 表示する角度の指定
          model.rotation.x = -1.57;
          model.rotation.z = -1.57;
          // model.opacity = 0.5;
          // 影の設定
          model.castShadow = true;
          // オブジェクトの名前を指定
          model.name = "suiso-sikaku";

          // 配列に水槽名を保存
          model_csv[0] = ["suiso-sikaku", 0, 2, 0];

          // 変数suiso_nameにモデル名を保存
          if (suiso_name != model.name) {
            suiso_name = model.name;
          }
          // オブジェクトをシーンに追加
          scene.add(model);
        });
      } else if (suiso_check === "suiso-entyu") {
        // 3dsファイルのパスを指定
        loader.load('./models/suiso_entyu3.dae', (collada) => {
          // 読み込み後に3D空間に追加
          let model = collada.scene;
          // 表示するサイズを指定
          model.scale.set(17, 17, 17);
          // 表示する位置を指定
          model.position.x = 0;
          model.position.y = 2;
          model.position.z = 0;
          // 表示する角度の指定
          model.rotation.x = -1.57;
          // 影の設定
          model.castShadow = true;
          // オブジェクトの名前を指定
          model.name = "suiso-entyu";

          // 配列に水槽名を保存
          model_csv[0] = ["suiso-entyu", 0, 2, 0];
          // 変数suiso_nameにモデル名を保存
          if (suiso_name != model.name) {
            suiso_name = model.name;
          }
          // オブジェクトをシーンに追加
          scene.add(model);
        });
      }
    }

    // さかなの座標はランダムでもよい
    function reFish() {
      // 3DS形式のモデルデータを読み込む
      // const loader = new THREE.ColladaLoader();
      // 3dsファイルのパスを指定
      loader.load('./models/sakana01.dae', (collada) => {
        // 読み込み後に3D空間に追加
        let model = collada.scene;
        // 表示するサイズを指定
        model.scale.set(1.25, 1.25, 1.25);
        // 表示する位置を指定
        model.position.x = -15 + Math.round((Math.random() * 35));
        model.position.y = -10 + Math.round((Math.random() * 25));
        model.position.z = -12 + Math.round((Math.random() * 23));
        // 表示する角度の指定
        model.rotation.x = -1.5;
        // 影の設定
        model.castShadow = true;
        // オブジェクトの名前を指定
        model.name = "model-" + scene.children.length;
        // オブジェクトをシーンに追加
        scene.add(model);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["sakana", model.position.x, model.position.y, model.position.z]);
      });
    }


    function reMizukusa(mzks_X, mzks_Y, mzks_Z) {

      // 3dsファイルのパスを指定
      loader.load('./models/mizukusa01.dae', (collada) => {
        // 読み込み後に3D空間に追加
        let model = collada.scene;
        // 表示するサイズを指定
        model.scale.set(3, 3, 3);
        // 表示する位置を指定
        model.position.x = mzks_X;
        model.position.y = mzks_Y;
        model.position.z = mzks_Z;


        // 表示する角度の指定
        model.rotation.x = -1.5;
        // 影の設定
        model.castShadow = true;
        // オブジェクトの名前を指定
        model.name = "mizukusa-" + scene.children.length;
        // mizukusa_name配列に名前を保存
        mizukusa_name.push([model.name, 0, 0, 0]);
        // オブジェクトをシーンに追加
        scene.add(model);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["mizukusa-" + scene.children.length, model.position.x, model.position.y, model.position.z]);

      });
    }

    function reSosyoku(ssk_X, ssk_Y, ssk_Z) {

      // 3dsファイルのパスを指定
      loader.load('./models/sosyoku01.dae', (collada) => {
        // 読み込み後に3D空間に追加
        let model = collada.scene;
        // 表示するサイズを指定
        model.scale.set(10, 10, 10);
        // 表示する位置を指定
        model.position.x = ssk_X;
        model.position.y = ssk_Y;
        model.position.z = ssk_Z;
        // 表示する角度の指定
        model.rotation.x = -1.5;
        // 影の設定
        model.castShadow = true;
        // オブジェクトの名前を指定
        // model.name = "sosyoku-" + scene.children.length;
        model.name = "sosyoku";
        // sosyoku_name配列に名前を保存
        sosyoku_name.push([model.name, 0, 0, 0]);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["sosyoku", model.position.x, model.position.y, model.position.z]);
        // オブジェクトをシーンに追加
        scene.add(model);

      });
    }

    getCSV(); //最初に実行される



    class CSV {
      constructor(data, keys = false) {
        this.ARRAY = Symbol('ARRAY')
        this.OBJECT = Symbol('OBJECT')

        this.data = data

        if (CSV.isArray(data)) {
          if (0 == data.length) {
            this.dataType = this.ARRAY
          } else if (CSV.isObject(data[0])) {
            this.dataType = this.OBJECT
          } else if (CSV.isArray(data[0])) {
            this.dataType = this.ARRAY
          } else {
            throw Error('Error: 未対応のデータ型です')
          }
        } else {
          throw Error('Error: 未対応のデータ型です')
        }

        this.keys = keys
      }

      toString() {
        if (this.dataType === this.ARRAY) {
          return this.data.map((record) => (
            record.map((field) => (
              CSV.prepare(field)
            )).join(',')
          )).join('\n')
        } else if (this.dataType === this.OBJECT) {
          const keys = this.keys || Array.from(this.extractKeys(this.data))

          const arrayData = this.data.map((record) => (
            keys.map((key) => record[key])
          ))

          // console.log([].concat([keys], arrayData))

          return [].concat([keys], arrayData).map((record) => (
            record.map((field) => (
              CSV.prepare(field)
            )).join(',')
          )).join('\n')
        }
      }

      save(filename = 'data.csv') {
        if (!filename.match(/\.csv$/i)) {
          filename = filename + '.csv'
        }

        console.info('filename:', filename)
        console.table(this.data)

        const csvStr = this.toString()

        const bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
        const blob = new Blob([bom, csvStr], {
          'type': 'text/csv'
        });
        const url = window.URL || window.webkitURL;
        const blobURL = url.createObjectURL(blob);

        let a = document.createElement('a');
        a.download = decodeURI(filename);
        a.href = blobURL;
        a.type = 'text/csv';

        a.click();
      }

      extractKeys(data) {
        return new Set([].concat(...this.data.map((record) => Object.keys(record))))
      }

      static prepare(field) {
        return ('' + field).replace(/"/g, '""')
      }

      static isObject(obj) {
        return '[object Object]' === Object.prototype.toString.call(obj)
      }

      static isArray(obj) {
        return '[object Array]' === Object.prototype.toString.call(obj)
      }
    }


    function init() {

      let stats = initStats();




      // dat.guiのコントロールエリアの設定
      let controls = new function() {

        this.rotationSpeed = 0;
        this.numberOfObjects = scene.children.length;
        this.positionX = 0;
        this.positionY = 4;
        this.positionZ = 0;
        this.視点を移動する = false;

        // “モデルを削除する”関数の定義と設定
        this.モデルを削除する = function() {
          let allChildren = scene.children;
          let lastObject = 0;
          if (allChildren.length > 4) {
            lastObject = allChildren[allChildren.length - 1];
            scene.remove(lastObject);
          }
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “水槽を初期化”関数の定義と設定
        this.水槽を初期化 = function() {

          scene.remove(scene.getObjectByName("suiso-sikaku"));
          scene.remove(scene.getObjectByName("suiso-entyu"));
        }

        // “四角い水槽”関数の定義と設定
        this.四角い水槽 = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/suiso3.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(5, 5, 5);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = 2;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.57;
            model.rotation.z = -1.57;
            // model.opacity = 0.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "suiso-sikaku";

            // 配列に水槽名を保存
            model_csv[0] = ["suiso-sikaku", 0, 2, 0];

            // 変数suiso_nameにモデル名を保存
            if (suiso_name != model.name) {
              suiso_name = model.name;
            }
            // オブジェクトをシーンに追加
            scene.add(model);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “円柱の水槽”関数の定義と設定
        this.円柱の水槽 = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/suiso_entyu3.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(17, 17, 17);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = 2;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.57;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "suiso-entyu";

            // 配列に水槽名を保存
            model_csv[0] = ["suiso-entyu", 0, 2, 0];
            // 変数suiso_nameにモデル名を保存
            if (suiso_name != model.name) {
              suiso_name = model.name;
            }
            // オブジェクトをシーンに追加
            scene.add(model);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “さかなを追加する”関数の定義と設定
        this.さかなを追加する = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/sakana01.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(1.25, 1.25, 1.25);
            // 表示する位置を指定
            model.position.x = -15 + Math.round((Math.random() * 35));
            model.position.y = -10 + Math.round((Math.random() * 25));
            model.position.z = -12 + Math.round((Math.random() * 23));
            // 表示する角度の指定
            model.rotation.x = -1.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "model-" + scene.children.length;
            // オブジェクトをシーンに追加
            scene.add(model);
            // 配列"model_csv"に要素を追加する
            model_csv.push(["sakana", model.position.x, model.position.y, model.position.z]);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “水槽を追加する”関数の定義と設定
        this.水草を追加する = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/mizukusa01.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(3, 3, 3);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = 0;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "mizukusa-" + scene.children.length;
            // mizukusa_name配列に名前を保存
            mizukusa_name.push([model.name, 0, 0, 0]);
            // 水草の座標のGUIの定義と設定
            guiPosition = gui.addFolder('水草の座標' + scene.children.length);
            var contX = guiPosition.add(controls, 'positionX', -50, 50);
            var contZ = guiPosition.add(controls, 'positionZ', -50, 50);
            // 座標のｘ軸の設定とチェックボックスの判定
            contX.listen();
            contX.onChange(function(value) {
              model.position.x = controls.positionX;
            });
            // 座標のｙ軸の設定とチェックボックスの判定
            contZ.listen();
            contZ.onChange(function(value) {
              model.position.z = controls.positionZ;
            });

            // 配列"model_csv"に要素を追加する
            model_csv.push(["mizukusa-" + scene.children.length, model.position.x, model.position.y, model.position.z]);

            // オブジェクトをシーンに追加
            scene.add(model);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “装飾を追加する”関数の定義と設定
        this.装飾を追加する = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/isi3.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(10, 10, 10);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = -7.7;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            // model.name = "sosyoku-" + scene.children.length;
            model.name = "sosyoku";
            // sosyoku_name配列に名前を保存
            sosyoku_name.push([model.name, 0, 0, 0]);
            // 装飾品の座標のGUIの定義と設定
            guiPosition = gui.addFolder('装飾品の座標' + scene.children.length);
            // 装飾の座標のGUIの定義と設定
            var contX = guiPosition.add(controls, 'positionX', -50, 50);
            var contZ = guiPosition.add(controls, 'positionZ', -50, 50);
            // 座標のｘ軸の設定とチェックボックスの判定
            contX.listen();
            contX.onChange(function(value) {
              model.position.x = controls.positionX;
            });
            // 座標のｚ軸の設定とチェックボックスの判定
            contZ.listen();
            contZ.onChange(function(value) {
              model.position.z = controls.positionZ;
            });
            // 配列"model_csv"に要素を追加する
            model_csv.push(["sosyoku", model.position.x, model.position.y, model.position.z]);
            // オブジェクトをシーンに追加
            scene.add(model);

          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “視点を戻す”関数の定義と設定
        this.視点を戻す = function() {
          // カメラの初期値を指定
          camera.position.x = 0;
          camera.position.y = 20;
          camera.position.z = 60;
          camera.lookAt(scene.position);
        };

        // “モデルを保存する”関数の定義と設定
        this.モデルを保存する = function() {
          // コンソールログにシーンにあるオブジェクトの情報を表示する
          // console.log(scene.children);

          // suiso_nameの確認
          // console.log(suiso_name);  

          // 配列"model_csv"に水槽の種類を追加(保存)する
          // if(suiso_name === "suiso-sikaku"){

          // let val = "suiso-entyu"
          // let res = model_csv.filter(function(a){
          //   return a !== val;
          // });
          // model_csv = res;
          //   model_csv.push(["suiso-sikaku", 0, 2, 0]);
          // }else if(suiso_name === "suiso-entyu"){

          // let val = "suiso-sikaku"
          // let res = model_csv.filter(function(a){
          //   return a !== val;
          // });
          // model_csv = res;
          //   model_csv.push(["suiso-entyu", 0, 2, 0]);
          // }else{
          //   // なにもしない
          // }

          for (i = 0; i < model_csv.length; i++) {

            // 水草の個々の座標の保存
            for (let mzks_num = 0; mzks_num < mizukusa_name.length; mzks_num++) {

              // ["モデル名", x, y, z]のモデル名のみ比較
              if (model_csv[i][0] === mizukusa_name[mzks_num][0]) {
                let k = mizukusa_name[mzks_num][0];
                let j = scene.getObjectByName(k);

                // 水草の移動後のｘ座標とｚ座標の値に変更する
                model_csv[i][1] = Math.floor(j.position.x);
                model_csv[i][3] = Math.floor(j.position.z);
              }
            }

            // 装飾品の個々の座標の保存
            for (let ssk_num = 0; ssk_num < sosyoku_name.length; ssk_num++) {

              // ["モデル名", x, y, z]のモデル名のみ比較
              if (model_csv[i][0] === sosyoku_name[ssk_num][0]) {
                let k = sosyoku_name[ssk_num][0];
                let j = scene.getObjectByName(k);

                // 水草の移動後のｘ座標とｚ座標の値に変更する
                model_csv[i][1] = Math.floor(j.position.x);
                model_csv[i][3] = Math.floor(j.position.z);
              }
            }
            // console.log(model_csv)
            // model_csv = [];
          }



          // console.log("確認↓");
          // console.log(model_csv);
          // console.log(model_csv.length);
          // console.log(model_csv[0][0]);
          // console.log("水草確認↓");
          // console.log(mizukusa_name);
          let qwe = ArrayToCSV(model_csv);

          (new CSV(model_csv)).save('scene.csv')
        }
      };


      // dat.GUIの設定
      // let gui = new dat.GUI();
      // // チェックボックスのパラメーターの設定(今回はtrue,false)
      // let = parameters = {
      //   a: false,
      //   b: false,
      // }

      // dat.GUIのコントロールに水槽の選択を追加
      // let suiso_select = gui.addFolder("水槽を選択してください");
      // let suiso1 = suiso_select.add(parameters, 'a').name('四角い水槽').listen().onChange(function() {
      //   setChecked("a");
      //   controls.水槽を初期化();
      //   controls.四角い水槽()
      // });
      // let suiso2 = suiso_select.add(parameters, 'b').name('円柱形の水槽').listen().onChange(function() {
      //   setChecked("b");
      //   controls.水槽を初期化();
      //   controls.円柱の水槽()
      // });

      // // 水槽のチェックボックスの判定
      // function setChecked(prop) {
      //   for (let param in parameters) {
      //     parameters[param] = false;
      //   }
      //   parameters[prop] = true;
      // }

      // dat.GUIのコントロールに関数を追加
      // gui.add(controls, 'さかなを追加する');
      // gui.add(controls, '水草を追加する');
      // gui.add(controls, '装飾を追加する');
      // gui.add(controls, 'モデルを削除する');
      // gui.add(controls, '水槽を初期化');
      // gui.add(controls, '視点を戻す');
      // gui.add(controls, 'モデルを保存する');

      // 画面を更新するrender関数を呼び出す
      render();


      // 画面を更新する関数
      function render() {
        stats.update();
        // render using requestAnimationFrame
        requestAnimationFrame(render);
        renderer.render(scene, camera);
      }

      // HTML要素への表示の設定
      function initStats() {

        let stats = new Stats();
        stats.setMode(0); // 0: fps, 1: ms
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.getElementById("Stats-output").appendChild(stats.domElement);

        return stats;
      }
    }


    // ここから配列をcsvに変換します
    function ArrayToCSV(array) {
      var csv = "";
      for (var i = 0; i < array.length; i++) {
        csv += array[i] + ",";
      }
      csv = csv.slice(0, -1);
      return csv;
    }



    // 画面がロードされたらinitを呼び出す
    window.onload = init;
  </script>
</body>

</html>