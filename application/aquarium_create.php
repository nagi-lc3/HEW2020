<?php
session_start();
// ログインしていない場合
if ($_SESSION['user_name'] == false) {
  header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 水槽作成</title>

  <?php include_once('./link.html'); ?>
  <script type="text/javascript" src="./threejs/three.min.js"></script>
  <script type="text/javascript" src="./threejs/stats.js"></script>
  <script type="text/javascript" src="./threejs/ColladaLoader.js"></script>
  <script type="text/javascript" src="./threejs/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="./threejs/OrbitControls.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.10.2/paper-full.min.js"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <div class="container my-5">

        <!-- Section -->
        <section>

          <!--メインビジュアル-->
          <main class="main">
            <!--水槽部分-->
            <div id="Stats-output">
            </div>
            <div id="WebGL-output" class="Aquarium">
            </div>

            <!--テーブル-->
            <div class="tab">
              <!--テーブルヘッダー-->
              <ul id="top">
                <li class="current">魚</li>
                <li>水草</li>
                <li>装飾品</li>
              </ul>


              <!--テーブルボディ-->
              <ul id="bottom">


                <!-- 魚 -->
                <section class="current">
                  <ul>

                    <!--魚のモジュール1-->
                    <li>
                      <div class="list_img">
                        <img src="images/カージナルテトラ.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>カージナルテトラ</h4>
                        <p>性格は穏和であり、他魚ともさほどトラブルを起こすことはないため、混泳に適する、初心者向け。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール2-->
                    <li>
                      <div class="list_img">
                        <img src="images/ウズマキヤッコ.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>ウズマキヤッコ</h4>
                        <p>タテジマキンチャクダイは幼魚の頃と見た目が全く違い、成長するにつれて大きく変化してきます。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish2()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish2_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール3-->
                    <li>
                      <div class="list_img">
                        <img src="images/グッピー.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>グッピー</h4>
                        <p>小型の胎生メダカ類である。観賞用に飼育されているこの仲間のうちでは、ごく小型の部類にはいる。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール4-->
                    <li>
                      <div class="list_img">
                        <img src="images/シマキンチャクフグ.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>シマキンチャクフグ</h4>
                        <p>シマキンチャクフグもフグ科ですから毒をもちます、危険が迫った時は体をふくらませることがあります。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール5-->
                    <li>
                      <div class="list_img">
                        <img src="images/ナンヨウハギ.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>ナンヨウハギ</h4>
                        <p>幼魚はサンゴの周囲に群れ、敵が近づくと素早くサンゴや岩の隙間に隠れる。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール6-->
                    <li>
                      <div class="list_img">
                        <img src="images/ハチェット.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>ハチェット</h4>
                        <p>実は非常に高いジャンプ力を持っているのが特徴。胸ビレがすごく長くなっていますよね。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール7-->
                    <li>
                      <div class="list_img">
                        <img src="images/ベタ.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>ベタ</h4>
                        <p>オスの闘争本能が強いため、オスを２匹一緒にすると、ヒレがボロボロになるまで闘います。
                          原産地はタイ</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                    <!--魚のモジュール8-->
                    <li>
                      <div class="list_img">
                        <img src="images/ルリスズメダイ.jpg" alt="魚イメージ画像">
                      </div>
                      <div class="list_text">
                        <h4>ルリスズメダイ</h4>
                        <p>名のとおり全身が鮮やかな瑠璃色をしており、尾びれが透明なのがメスで、尾びれまで瑠璃色なのがオス。</p>
                      </div>
                      <div class="list_btton">
                        <form action="">
                          <button type="button" onclick="fish()" class="button btn-primary">増やす</button>
                          <button type="button" onclick="fish_del()" class="button btn-primary">減らす</button>
                        </form>
                      </div>
                    </li>

                  </ul>
                </section>


                <!-- 水草 -->
                <section class="">
                  <ul>
                    <!--水草のモジュール1-->
                    <li id="mzks1">
                      <div class="list_img">
                        <label for="mzks1_clk">
                          <img src="images/mizukusa1.png" alt="水草イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>水草(L)</h4>
                        <p>水草</p>
                      </div>
                      <div class="list_btton">
                        <input class="select_radio" id="mzks1_clk" type="radio" name="haiti" onclick="haiti_mzks();selected_radio('mzks1');" checked>
                      </div>
                    </li>

                    <!--水草のモジュール2-->
                    <li id="mzks2">
                      <div class="list_img">
                        <label for="mzks2_clk">
                          <img src="images/mizukusa1.png" alt="水草イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>水草(M)</h4>
                        <p>水草</p>
                      </div>
                      <div class="list_btton">
                        <input class="select_radio" id="mzks2_clk" type="radio" name="haiti" onclick="haiti_mzks();selected_radio('mzks2');">
                      </div>
                    </li>

                    <!--水草のモジュール3-->
                    <li id="mzks3">
                      <div class="list_img">
                        <label for="mzks3_clk">
                          <img src="images/mizukusa1.png" alt="水草イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>水草(S)</h4>
                        <p>水草</p>
                      </div>
                      <div class="list_btton">
                        <input class="select_radio" id="mzks3_clk" type="radio" name="haiti" onclick="haiti_mzks();selected_radio('mzks3');">
                      </div>
                    </li>

                    <!--水草のモジュール44-->
                    <li id="mzks4">
                      <div class="list_img">
                        <label for="mzks4_clk">
                          <img src="images/mizukusa1.png" alt="水草イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>水草</h4>
                        <p>水草</p>
                      </div>
                      <div class="list_btton">
                        <input class="select_radio" id="mzks4_clk" type="radio" name="haiti" onclick="haiti_mzks();selected_radio('mzks4');">
                      </div>
                    </li>

                  </ul>
                </section>


                <!--装飾品-->
                <section class="">
                  <ul>
                    <!--装飾品のモジュール1-->
                    <li id="ssk1">
                      <div class="list_img">
                        <label for="ssk1_clk">
                          <img src="images/sosyoku1.png" alt="装飾イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>置き石(L)</h4>
                        <p>装飾品</p>
                      </div>
                      <div class="list_btton">
                        <input class="select_radio" id="ssk1_clk" type="radio" name="haiti" onclick="haiti_ssk();selected_radio('ssk1');">
                      </div>
                    </li>

                    <!--装飾品のモジュール2-->
                    <li id="ssk2">
                      <div class="list_img">
                        <label for="ssk2_clk">
                          <img src="images/sosyoku1.png" alt="装飾イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>置き石(M)</h4>
                        <p>装飾品</p>
                      </div>
                      <div class="list_btton">
                      <input class="select_radio" id="ssk2_clk" type="radio" name="haiti" onclick="haiti_ssk();selected_radio('ssk2');">
                      </div>
                    </li>

                    <!--装飾品のモジュール3-->
                    <li id="ssk3">
                      <div class="list_img">
                        <label for="ssk3_clk">
                          <img src="images/sosyoku1.png" alt="装飾イメージ画像">
                        </label>
                      </div>
                      <div class="list_text">
                        <h4>置き石(S)</h4>
                        <p>装飾品</p>
                      </div>
                      <div class="list_btton">
                      <input class="select_radio" id="ssk3_clk" type="radio" name="haiti" onclick="haiti_ssk();selected_radio('ssk3');">
                      </div>
                    </li>

                  </ul>
                </section>


              </ul>
            </div>


            <!-- <script type="text/javascript" src="./js/mysuiso.js"></script> -->
            <!--水槽コントロールボタン-->
            <div class="view">
              <div class="Ctrl_window">
                <canvas id="subCanvas" width="300px" height="300px"></canvas>
                <canvas id="mainCanvas" width="300px" height="300px"></canvas>
              </div>
              <div class="model_botton">
                <form action="#" method="POST">
                  <button type="button" onclick="sakujo()">全て削除</button>
                  <button type="button" onclick="modoru()">ひとつ戻る</button>
                  <!-- <button>視点を戻す</button> -->
                  <button type="button" onclick="siten()">視点を戻す</button>
                  <button type="button" onclick="SaveScene()">モデルを保存</button>
                </form>
              </div>
            </div>

          </main>
        </section>
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>

  <script>
    var navList = document.getElementById('top').getElementsByTagName('li');
    var contents = document.getElementById('bottom').getElementsByTagName('section');
    for (var i = 0; i < navList.length; i++) {
      //在事件之前我先把索引给准备好
      navList[i].setAttribute("index", i);
      navList[i].onclick = function() {
        for (var j = 0; j < navList.length; j++) {
          //removeAttribute既可以移除自定义属性，也可以移除非自定义属性
          navList[j].removeAttribute('class');
        }
        this.className = "current";
        //将索引值先给存下来
        var num = this.getAttribute("index");
        for (var k = 0; k < contents.length; k++) {
          contents[k].removeAttribute('class');
        }
        contents[num].className = "current";
      }
    }

    // 現在選択中のradioボタンを格納しておく変数
    let selected_item = 'mzks1';

    // 水草と装飾の選択のエフェクト(radioボタン)
    function selected_radio(temp){
      document.getElementById( selected_item ).style.backgroundColor = '#ccc';
      document.getElementById( temp ).style.backgroundColor = '#74bdff';
      return selected_item = temp;

    }



    let haiti = 0;

    function haiti_mzks(){
      haiti = 0;
      return haiti;
    }
    function haiti_ssk(){
      haiti = 1;
      return haiti;
    }

    // import * as THREE from './threejs/three.module.js';

    class CSV {
      constructor(data, keys = false) {
        this.ARRAY  = Symbol('ARRAY')
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
        if (!filename.match(/\.csv$/i)) { filename = filename + '.csv' }

        console.info('filename:', filename)
        console.table(this.data)

        const csvStr = this.toString()

        const bom     = new Uint8Array([0xEF, 0xBB, 0xBF]);
        const blob    = new Blob([bom, csvStr], {'type': 'text/csv'});
        const url     = window.URL || window.webkitURL;
        const blobURL = url.createObjectURL(blob);

        let a      = document.createElement('a');
        a.download = decodeURI(filename);
        a.href     = blobURL;
        a.type     = 'text/csv';

        a.click();
      }

      extractKeys(data) {
        return new Set([].concat(...this.data.map((record) => Object.keys(record))))
      }

      static prepare(field) {
        return (''+field).replace(/"/g, '""')
      }

      static isObject(obj) {
        return '[object Object]' === Object.prototype.toString.call(obj)
      }

      static isArray(obj) {
        return '[object Array]' === Object.prototype.toString.call(obj)
      }
    }

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
    let model_csv = [[0,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,0]];

    // 水槽モデルの”model.name”を一時保存する変数
    let suiso_name;
    // 水草モデルの”model.name”を一時保存する配列
    let mizukusa_name = [];
    // 装飾品モデルの”model.name”を一時保存する配列
    let sosyoku_name = [];




      //CSVファイルを読み込む関数getCSV()の定義
      function getCSV(){
          var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
          req.open("post", "path_to_csv", true); // アクセスするファイルを指定
          req.send(null); // HTTPリクエストの発行

          // レスポンスが返ってきたらconvertCSVtoArray()を呼ぶ
          req.onload = function(){
          convertCSVtoArray(req.responseText); // 渡されるのは読み込んだCSVデータ
          }
      }

      // 読み込んだCSVデータを二次元配列に変換する関数convertCSVtoArray()の定義
      function convertCSVtoArray(str){ // 読み込んだCSVデータが文字列として渡される
          let rebuild = [];
          var result = []; // 最終的な二次元配列を入れるための配列
          var tmp = str.split("\n"); // 改行を区切り文字として行を要素とした配列を生成

          // 各行ごとにカンマで区切った文字列を要素とした二次元配列を生成
          for(var i=0;i<tmp.length;++i){
              result[i] = tmp[i].split(',');
          }

          // console.log(rebuild);
          rebuild = rebuild.concat(result);

          let suiso_check = rebuild[3][0];
          reSuiso(suiso_check);


          let sakana_num = rebuild[0][0];
          for(let s=1; s<=sakana_num; s++){

            let sakana_check = "sakana-" + s;

            for(let j=0; j<rebuild.length;j++){

              if(rebuild[j][0] === sakana_check){
                reFish();
              }
            }
          }

          let mizukusa_num = rebuild[1][0];
          for(let m=1; m<=mizukusa_num; m++){

            let mizukusa_check = "mizukusa-" + m;

            for(let j=0; j<rebuild.length;j++){

              if(rebuild[j][0] === mizukusa_check){
                let mzks_X = rebuild[j][1];
                let mzks_Y = rebuild[j][2];
                let mzks_Z = rebuild[j][3];
                reMizukusa(mzks_X,mzks_Y,mzks_Z);
              }
            }
          }


          let sosyoku_num = rebuild[2][0];
          for(let m=1; m<=sosyoku_num; m++){

            let sosyoku_check = "sosyoku-" + m;

            for(let j=0; j<rebuild.length;j++){

              if(rebuild[j][0] === sosyoku_check){
                let ssk_X = rebuild[j][1];
                let ssk_Y = rebuild[j][2];
                let ssk_Z = rebuild[j][3];
                reSosyoku(ssk_X,ssk_Y,ssk_Z);
              }
            }
          }
          // if(rebuild[j][0] === "mizukusa"){
          //   reMizukusa();
          // }

          return rebuild;
      }

      function reSuiso(suiso_check){
        if(suiso_check === "suiso-sikaku"){
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
            if(suiso_name != model.name){
              suiso_name = model.name;
            }
            // オブジェクトをシーンに追加
            scene.add(model);
          });
        }else if(suiso_check === "suiso-entyu"){
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
            if(suiso_name != model.name){
              suiso_name = model.name;
            }
            // オブジェクトをシーンに追加
            scene.add(model);
          });
        }
      }

      // さかなの座標はランダムでもよい
      function reFish(){
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

      function reMizukusa(mzks_X,mzks_Y,mzks_Z){

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

      function reSosyoku(ssk_X,ssk_Y,ssk_Z){

        // 3dsファイルのパスを指定
        loader.load('./models/isi3.dae', (collada) => {
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


// const mouse = new THREE.Vector2();
let INTERSECTED;
let plane;

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
renderer.setSize(698, 391);
// renderer.setSize(window.innerWidth, window.innerHeight);
// 影の定義
renderer.shadowMap.enabled = true;

// rendererの出力をhtmlに追加
document.getElementById("WebGL-output").appendChild(renderer.domElement);

// // gridHelper
// gridHelper = new THREE.GridHelper(200, 50);  // 引数は サイズ、1つのグリッドの大きさ
// scene.add(gridHelper);

// // axisHelper
// axisHelper = new THREE.AxisHelper(1000);  // 引数は 軸のサイズ
// scene.add(axisHelper);


  // カメラの定義と設定
  let camera = new THREE.PerspectiveCamera(45, 698 / 391, 0.1, 1000);
  // let camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
  // カメラの位置の指定
  camera.position.x = 0;
  camera.position.y = 20;
  camera.position.z = 60;
  // カメラの向きの指定
  camera.lookAt(scene.position);
  // マウスでカメラをコントロール
  let orbit = new THREE.OrbitControls(camera, renderer.domElement);
  // シーンにcamera(カメラ)を追加する
  scene.add(camera);




  // ライト(光)の定義と指定
  // ambiLight(シーン内のオブジェクトを均等に照らすライト)の定義と明るさ指定
  var ambiLight = new THREE.AmbientLight(0x242424);
  // var ambiLight = new THREE.AmbientLight(0x242424);
  scene.add(ambiLight);

  // spotLight(単一の点から一方向に放射され，円錐に発せられるライト)の定義と設定
  let spotLight = new THREE.SpotLight(0xffffff);
  // 位置の指定
  spotLight.position.set(0, 50, 0);
  // spotLight.position.set(0, 50, 0);
  // 影の設定(spotLightは影が発生する)．今回は発生させる
  spotLight.castShadow = true;
  scene.add(spotLight);



  // 3DS形式のモデルデータを読み込む
  const loader = new THREE.ColladaLoader();

  function init() {

    let stats = initStats();




    // 画面を更新するrender関数を呼び出す
    render();


    // 画面を更新する関数
    function render() {

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


  // ---------------------------------------------------------------------------


  // 水草カウンタ
  let mizukusa_count = 0;

  let sosyoku_count = 0;

  let canvas_num = 4;

  let canvas = new fabric.Canvas('mainCanvas');
  // let canvas_sub = new fabric.Canvas('subCanvas');


  // ここからcanvas内の水槽の枠の表示------------------------------------------

  let suiso_sikaku = document.getElementById('subCanvas');
  let suiso_sikaku_context = suiso_sikaku.getContext('2d');

  suiso_sikaku_context.beginPath();

  suiso_sikaku_context.rect(30,110,230,110);
  suiso_sikaku_context.strokeStyle = 'bule';
  suiso_sikaku_context.lineWidth = 1;
  suiso_sikaku_context.stroke();

  let canvas_suiso_sikaku = 0;

  // canvas_sub.add(new fabric.Line(
  //   [30, 100, 270, 100],{  //始点x,y,終点x,y
  //     strokeWidth: 3,       //太さ
  //     stroke: 'blue',       //色
  //     angle: 0              //角度
  //   }));
  //   canvas_sub.add(new fabric.Line(
  //     [30, 220, 270, 220],{  //始点x,y,終点x,y
  //       strokeWidth: 3,       //太さ
  //       stroke: 'blue',       //色
  //       angle: 0              //角度
  //     }));
  //     canvas_sub.add(new fabric.Line(
  //       [30, 100, 30, 220],{  //始点x,y,終点x,y
  //   strokeWidth: 3,       //太さ
  //   stroke: 'blue',       //色
  //   angle: 0              //角度
  // }));
  // canvas_sub.add(new fabric.Line(
  //   [270, 100, 270, 220],{  //始点x,y,終点x,y
  //     strokeWidth: 3,       //太さ
  //     stroke: 'blue',       //色
  //     angle: 0              //角度
  //   }));

  //   canvas_sub.item(0).evented = false;
  //   canvas_sub.item(1).evented = false;
  //   canvas_sub.item(2).evented = false;
  //   canvas_sub.item(3).evented = false;

    // -------------------------------------------------------------------------

    function createOBJ(x, y){

      // canvas_count++;
      if(haiti === 0){
        mizukusa_count++;
        canvas.add(new fabric.Circle({
          id: 'mizukusa-' + mizukusa_count,
          radius: 10,
          fill: 'green',
          top: y,
          left: x
        }));
      } else if(haiti === 1){
        sosyoku_count++;
        canvas.add(new fabric.Rect({
          id: 'sosyoku-' + sosyoku_count,
          left: x,         //左上角の左
          top: y,          //左上角の上
          width: 30,        //幅
          height: 30,       //高さ
          strokeWidth: 3,   //線の太さ
          stroke: 'blue',   //線の色
          fill: 'blue',//塗潰しの色
        }));
      }


      canvas.forEachObject(function(o){ o.hasBorders = o.hasControls = false; });

      canvas.hoverCursor = 'pointer';

    }

    let dragover = true;

    canvas.on({



      'mouse:down': function(e) {
        // canvas.getActiveObject().get('id');
        var pointer = canvas.getPointer(event.e);
        var posX = Math.floor(pointer.x);
        // console.log(posX);
        // console.log(mizukusa_count);

        dragover = false;
      },
      'mouse:over': function(e) {
        if (e.target) {
          // e.target.opacity = 0.5;
          // dragover = true;
          canvas.renderAll();

        }
      },
      'mouse:move': function(E) {
        // dragover = false;
        dragover = true;
      },
      'mouse:up': function(e) {

        if (e.target) {
        }
        // e.target.opacity = 1;
        canvas.renderAll();

        // 点の座標を取得(切り捨て)
        var pointer = canvas.getPointer(event.e);
        var posX = Math.floor(pointer.x);
        var posY = Math.floor(pointer.y);

        // console.log('ＵＰ座標');
        // console.log(posX+", "+posY);


        if(!dragover){

          let offsetX = Math.floor((posX - 130) / 5);
          let offsetY = Math.floor((posY - 150) / 5);
          // dragover = false;
          if((30<posX)&&(posX<255)&&(100<posY)&&(posY<200)){

            createOBJ(posX, posY);
            if(haiti === 0){
              mzks(offsetX, offsetY);
            }else if(haiti === 1){
              ssk(offsetX, offsetY);
            }
          }
        }else if((posX<30)||(255<posX)||(posY<100)||(210<posY)){
          // scene.remove(scene.getObjectByName("mizukusa"));
          // THREE.Scene.getObjectByName(qwe);
          // console.log(scene.children.length);
          // console.log(scene.children[8]);
          let tmp = canvas.getActiveObject().get('id');
          scene.remove(scene.getObjectByName(tmp));
          canvas.remove(canvas.getActiveObject());
        }else{

          let tmp = canvas.getActiveObject().get('id');
          console.log(tmp);

          let change_OBJ = scene.getObjectByName(tmp);
          let offsetX = Math.floor((posX - 130) / 5);
          let offsetY = Math.floor((posY - 150) / 5);
          change_OBJ.position.x = offsetX;
          change_OBJ.position.z = offsetY;

          // 配列"model_csv"に要素を追加する
          model_csv.push(["mizukusa-" + mizukusa_count, model.position.x, model.position.y, model.position.z]);
        }

      },
      'object:moved': function(e) {
        e.target.opacity = 0.5;
      },
      'object:modified': function(e) {
        e.target.opacity = 1;
      }
    });

    suiso();

    // ここから水槽を設置する関数-----------------------------------------------

    function suiso(){

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
        model_csv[3] = ["suiso-sikaku", 0, 2, 0];

        // 変数suiso_nameにモデル名を保存
        if(suiso_name != model.name){
          suiso_name = model.name;
        }
        // オブジェクトをシーンに追加
        scene.add(model);
      });
    }
    // ---------------------------------------------------------------------------

    // さかなカウンタ
    let sakana_count = 0;

    // ここからさかなを設置する関数-----------------------------------------------

    function fish(){
      // 3dsファイルのパスを指定
      loader.load('./models/sakana01.dae', (collada) => {
        sakana_count++;
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
        model.name = "sakana";
        // model.name = "sakana-" + sakana_count;
        // オブジェクトをシーンに追加
        scene.add(model);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["sakana-" + sakana_count, model.position.x, model.position.y, model.position.z]);
      });
    }
    function fish2(){
      // 3dsファイルのパスを指定
      loader.load('./models/sakana01.dae', (collada) => {
        sakana_count++;
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
        model.name = "sakana2";
        // model.name = "sakana-" + sakana_count;
        // オブジェクトをシーンに追加
        scene.add(model);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["sakana-" + sakana_count, model.position.x, model.position.y, model.position.z]);
      });
    }

    // ---------------------------------------------------------------------------

    // ここから水草を設置する関数-----------------------------------------------
    function fish_del(){
        scene.remove(scene.getObjectByName("sakana"));
    }
    function fish2_del(){
        scene.remove(scene.getObjectByName("sakana2"));
    }
    // ---------------------------------------------------------------------------


    // ここから水草を設置する関数-----------------------------------------------

    function mzks(i,j){
      // 3dsファイルのパスを指定
      loader.load('./models/mizukusa01.dae', (collada) => {
        // 読み込み後に3D空間に追加
        let model = collada.scene;
        // 表示するサイズを指定
        model.scale.set(3, 3, 3);
        // 表示する位置を指定
        model.position.x = i;
        model.position.y = 0;
        model.position.z = j;


        // 表示する角度の指定
        model.rotation.x = -1.5;
        // 影の設定
        model.castShadow = true;
        // オブジェクトの名前を指定
        model.name = "mizukusa-" + mizukusa_count;
        // mizukusa_name配列に名前を保存
        mizukusa_name.push([model.name, 0, 0, 0]);
        // オブジェクトをシーンに追加
        scene.add(model);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["mizukusa-" + mizukusa_count, 0, 0, 0]);
      });
    }
    // -------------------------------------------------------------------------


    // ここから装飾を設置する関数-----------------------------------------------

    function ssk(i,j){
        // 3dsファイルのパスを指定
        loader.load('./models/sosyoku01.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(10, 10, 10);
            // 表示する位置を指定
            model.position.x = i;
            model.position.y = -7.7;
            model.position.z = j;
        // 表示する角度の指定
        model.rotation.x = -1.5;
        // 影の設定
        model.castShadow = true;
        // オブジェクトの名前を指定
        // model.name = "sosyoku-" + scene.children.length;
        model.name = "sosyoku-" + sosyoku_count;
        // sosyoku_name配列に名前を保存
        sosyoku_name.push([model.name, 0, 0, 0]);
        // 配列"model_csv"に要素を追加する
        model_csv.push(["sosyoku-" + sosyoku_count, 0, 0, 0]);
        // オブジェクトをシーンに追加
        scene.add(model);
      });
    }

    // ---------------------------------------------------------------------------

    // ここから視点を戻す関数----------------------------------------------------

    function siten(){

        // カメラの初期値を指定
        camera.position.x = 0;
        camera.position.y = 20;
        camera.position.z = 60;
        camera.lookAt(scene.position);
    }

    // -------------------------------------------------------------------------

    // ここからモデル削除関数-----------------------------------------------
    function sakujo(){
        let allChildren = scene.children;
        let lastObject = 0;

        for(let e=allChildren.length;e>5;e--){

            if(allChildren.length>4){
                lastObject = allChildren[allChildren.length - 1];
                scene.remove(lastObject);
            }
        }
    }
    // -------------------------------------------------------------------------

    // ここからやり直し関数-----------------------------------------------

    function modoru(){
        let allChildren = scene.children;
        let lastObject = 0;
        if(allChildren.length>5){
            lastObject = allChildren[allChildren.length - 1];
            scene.remove(lastObject);
        }
    }
    // -------------------------------------------------------------------------


    // ここからモデルを保存する関数------------------------------------------------

    function SaveScene() {

        model_csv[0][0] = sakana_count;
        model_csv[1][0] = mizukusa_count;
        model_csv[2][0] = sosyoku_count;


      for(i=0; i<model_csv.length; i++){

        // 水草の個々の座標の保存
        for(let mzks_num=0; mzks_num<mizukusa_name.length; mzks_num++){

          // ["モデル名", x, y, z]のモデル名のみ比較
          if(model_csv[i][0] === mizukusa_name[mzks_num][0]){
            let k = mizukusa_name[mzks_num][0];
            let j = scene.getObjectByName(String(k));

            // 水草の移動後のｘ座標とｚ座標の値に変更する
            model_csv[i][1] = Math.floor(j.position.x);
            model_csv[i][3] = Math.floor(j.position.z);
          }
        }

        // 装飾品の個々の座標の保存
        for(let ssk_num=0; ssk_num<sosyoku_name.length; ssk_num++){

          // ["モデル名", x, y, z]のモデル名のみ比較
          if(model_csv[i][0] === sosyoku_name[ssk_num][0]){
            let k = sosyoku_name[ssk_num][0];
            let j = scene.getObjectByName(String(k));

            // 装飾の移動後のｘ座標とｚ座標の値に変更する
            model_csv[i][1] = Math.floor(j.position.x);
            model_csv[i][3] = Math.floor(j.position.z);
          }
        }
      }

      let qwe = ArrayToCSV(model_csv);

    //   console.log(qwe);

      let json = JSON.stringify(model_csv);

      // console.log(json);

      // ajax(json);

      // ここからAjaxでJavaScriptからPHPに配列を送る
      // ------------------------------------------------------------------
      $(function(){
        $.ajax({
          //POST通信
          type: "POST",
          //ここでデータの送信先URLを指定します。
          url: "csv_receive_and_save.php",
          data: {model_erea: json},
          //処理が成功したら
          success : function(data) {
            //HTMLファイル内の該当箇所にレスポンスデータを追加する場合
            //  $('#sample').html("送信成功しました");
            alert("送信成功しました");
          },
          //処理がエラーであれば
          error : function() {
            alert('通信エラー');
          }
        });
        //submitによる画面リロードを防いでいます。
        return false;
      });
      // ------------------------------------------------------------------


      // (new CSV(model_csv)).save('scene.csv')

    }
    // ---------------------------------------------------------------------------


    // ここから配列をcsvに変換します
    function ArrayToCSV(array){
      var csv="";
      for(var i=0;i<array.length;i++){
        csv+=array[i]+",";
      }
      csv=csv.slice(0,-1);
      return csv;
    }


    // 画面がロードされたらinitを呼び出す
    window.onload = init;
  </script>
</body>

</html>
