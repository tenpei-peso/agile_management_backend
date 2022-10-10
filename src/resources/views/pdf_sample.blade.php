<html lang="ja">
    <head>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>請求書 - 印刷プレビュー</title>
            {{-- <link rel="stylesheet" href="style.css" type="text/css"> --}}
        <style>
            @font-face{
                font-family: ipaexm;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('fonts/ipaexm.ttf')}}") format('truetype');
            }
            @font-face {
                font-family: ipaexm;
                font-style: bold;
                font-weight: bold;
                src: url('{{ storage_path('fonts/ipaexm.ttf')}}') format('truetype');
            }
            body {
                font-family: ipaexm !important;
                margin: 0;
            }

            .sheet {
            /* ページ（シート）毎に改ページする */
            page-break-after: always;
            box-sizing: border-box;
            overflow: hidden;
            }

            /* 用紙サイズに合わせてシートのサイズを定義 */
            .A3 .sheet {
            width: 297mm;
            /* 用紙サイズちょうどだと、なぜか溢れてしまうので 1mm ほど小さくする */
            height: 419mm; /* 420mm */
            }

            .A4 .sheet {
            width: 210mm;
            height: 296mm; /* 297mm */
            }

            .A5 .sheet {
            width: 148mm;
            height: 209mm; /* 210mm */
            }

            @page {
            /*
            * 余白を0にすると、ブラウザが勝手に印字するヘッダーとかを削除できる。
            * ただし、Chrome/Firefox のみ
            */
            margin: 0;
            }

            @media print{
            .sheet {
                /* 背景を印字できるようにする。ただし Chrome のみ */
                -webkit-print-color-adjust: exact;
            }
            }

            /* プレビュー画面スタイル */
            @media screen {
            body {
                background: #eee;
            }
            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
                margin: 5mm auto;
            }
            }
            p {
                padding: 0;
            }
            
            .invoice {
                padding: 70px 50px 50px 50px;
                font-size: 13px;
            }
            
            .invoice .header {
                margin-bottom: 40px;
            }
            
            .invoice .details {
                margin-bottom: 50px;
            }
            
            .invoice .header .meta p {
                text-align: right;
            }
            
            .invoice h1 {
                text-align: center;
                font-size: 32px;
            }
            
            .invoice .recipients-sender {
                display: flex;
            }
            
            .invoice .sender {
                width: 45%;
            }
            
            .invoice .recipients {
                width: 55%;
            }
            
            .invoice .sender .sender-logo img {
                max-width: 70%;
            }
            
            .invoice .recipients .recipient-name {
                font-size: 20px;
                text-decoration: underline;
                margin-bottom: 20px;
            }
            
            .invoice .recipients .message {
                margin: 15px 0;
            }
            
            .invoice .recipients .total-amount {
                display: flex;
                width: 80%;
                font-size: 17px;
                justify-content: space-between;
                border-bottom: 1px solid #000;
            }
            
            .invoice .sender .sender-logo {
                margin-bottom: 20px;
            }
            
            .invoice .sender .sender-name {
                font-size: 15px;
                margin-bottom: 15px;
            }
            
            .invoice .sender .sender-address {
                font-size: 12px;
            }
            
            .invoice .details table {
                width: 100%;
                border-collapse: collapse;
                height: 250px;
            }
            
            .invoice .details th {
                border: 1px solid #000;
                font-size: 14px;
                background-color: #d9d8d8;
            }
            
            .invoice .details td {
                border: 1px solid #000;
                padding: 0 10px;
            }
            
            .invoice .details .name {
                width: 50%;
            }
            
            .invoice .details .quantity {
                text-align: right;
            }
            
            .invoice .details .unit-price {
                text-align: right;
            }
            
            .invoice .details .amount {
                text-align: right;
            }
            
            .invoice .details .blank {
                border: 0
            }
        </style>
    </head>

    <body>
        @if ($billData)
        <body class="A4">
            <section class="sheet">
              <div class="invoice">
                <div class="header">
                  <div class="meta">
                    {{-- 自動送付日と請求書の年月を合わせたやつ --}}
                    <p>2017年12月07日</p>
                    {{-- id --}}
                    <p>請求書番号: 20171207-001</p>
                  </div>
                  <h1>請求書</h1>
                  <div class="recipients-sender">
                    <div class="recipients">
                        {{-- 会社名 --}}
                      <p class="recipient-name">サンプル株式会社様</p> 
                      <p class="message">下記の通りご請求申し上げます。</p>
                      <dl class="total-amount">
                        <dt>ご請求金額</dt>
                        {{-- 消費税と合計金額 --}}
                        <dd>¥ 19,800 -</dd>
                      </dl>
                    </div>
                    <div class="sender">
                        {{-- 自分の名前 --}}
                      <p class="sender-name">株式会社テスト</p>
                      <p class="sender-address">
                        mdiawmda@gmail.com<br>
                        TEL : 080-9758-0084<br>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="details">
                  <table>
                    <tbody>
                      <tr>
                        <th>品番・品名</th>
                        <th>数量</th>
                        <th>単価</th>
                        <th>金額</th>
                      </tr>
                      <tr>
                        <td class="name">時給</td>

                        <td class="quantity">10</td>
                        {{-- unit_price --}}
                        <td class="unit-price">300円</td>
                        {{-- 単価*労働時間 --}}
                        <td class="amount">6,000円</td>
                     </tr>
                     <tr>
                        <td class="name">交通費</td>
                        <td class="quantity">1個</td>
                        {{-- 経費 --}}
                        <td class="unit-price">500円</td>
                        <td class="amount">500円</td>
                      </tr>
                      <tr>
                        <td rowspan="3" class="blank"></td>
                        <td colspan="2">小計</td>
                        {{-- 全部の合計 --}}
                        <td class="amount">6,500円</td>
                      </tr>
                      <tr>
                        <td colspan="2">消費税</td>
                        {{-- 全部の合計*0.1 --}}
                        <td class="amount">520円</td>
                      </tr>
                      <tr>
                        <td colspan="2">合計</td>
                        {{-- 消費税と合計金額 --}}
                        <td class="amount">7,020円</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="footer">
                  <p class="note">
                    ご査収のほど、よろしくお願いいたします。
                  </p>
                </div>
              </div>
            </section>
          </body>
        @else
            <h1>請求情報がありません</h1>
        @endif
    </body>
</html>