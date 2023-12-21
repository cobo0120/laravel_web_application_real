// const { sample } = require("lodash");

// ボタンをクリックしたときの処理
const btn = document.getElementById('add-item');
const tbdy = document.querySelector('tbody');
btn.addEventListener('click', () => {
tbdy.appendChild(createNewTr());
});

// 新しい行を作成し、作成した行を返す関数の設定
  function createNewTr() {
  const additionalPurchase = document.getElementById('item_table').rows.length;


  const newTr = document.createElement('tr');
  newTr.classList.add('item');
  
// td要素を追加する（区分）
const newTd1 = document.createElement('td');
newTr.appendChild(newTd1);
  // select要素を作成し、td要素に追加する
  const select1 = document.createElement('select');
  select1.addEventListener("change", calc_tax_amount, false);
  select1.addEventListener("change", calc_subtotal, false); 
  newTd1.appendChild(select1);
  // 'form-control' クラスをselectタグに追加
  select1.classList.add('form-control');
  // name属性をselectタグに追加
  select1.setAttribute("name", "consumables_equipment_id["+(additionalPurchase-1)+"]");

 // consumables 配列を定義する
const consumables = [
  { id: 1, consumables_equipment: '文具' },
  { id: 2, consumables_equipment: 'トナー' },
  { id: 3, consumables_equipment: '印刷用紙' },
  { id: 4, consumables_equipment: 'その他' },
  { id: 5, consumables_equipment: '軽減税率対象' },
];       
// consumables 配列の要素をループ処理する
consumables.forEach(consumable => {
// optionタグを作成する
const option1 = document.createElement('option');
// optionタグのテキストを設定
option1.textContent = consumable.consumables_equipment;
// optionタグの value 属性を設定
option1.value = consumable.id;
// optionタグを select 要素に追加する
select1.appendChild(option1);
});

 
  
  
  //  td要素を追加する（商品名）
  const newTd2 = document.createElement('td'); 
  newTr.appendChild(newTd2);
  // input要素を作成し、td要素に追加する
  const input1 = document.createElement('input');
  // 属性typeにtext、クラス'form-control'をinputタグに追加
  input1.type = 'text';
  input1.classList.add('form-control');
  input1.name = 'product_name['+(additionalPurchase-1)+']';
  newTd2.appendChild(input1);
  
  
  //  td要素を追加する（購入単価）
  const newTd3 = document.createElement('td'); 
  newTr.appendChild(newTd3);
  // input要素を作成し、td要素に追加する
  const input2 = document.createElement('input');
  // 属性typeにtext、クラス'form-control'をinputタグに追加
  input2.type = 'text';
  input2.classList.add('form-control');
  input2.value ='';
  input2.size = '5';
  input2.name = 'unit_purchase_price['+(additionalPurchase-1)+']';
  input2.pattern = '^[0-9]+$';
  input2.style.textAlign = 'right';
  input2.addEventListener("change", calc_tax_amount, false);
  input2.addEventListener("change", calc_subtotal, false); 
  newTd3.appendChild(input2);
 
  
  //  td要素を追加する(数量)
  const newTd4 = document.createElement('td'); 
  newTr.appendChild(newTd4);
  // input要素を作成し、td要素に追加する
  const input3 = document.createElement('input');
  // 属性typeにtext、クラス'form-control'をinputタグに追加
  input3.type = 'text';
  input3.classList.add('form-control');
  input3.value ='';
  input3.size = '3';
  input3.name = 'purchase_quantities['+(additionalPurchase-1)+']';
  input3.pattern = '^[0-9]+$';
  input3.style.textAlign = 'right';
  input3.addEventListener("change", calc_tax_amount, false);
  input3.addEventListener("change", calc_subtotal, false); 
  newTd4.appendChild(input3);
  
  
  
  
  //  td要素を追加する(単位)
  const newTd5 = document.createElement('td'); 
  newTr.appendChild(newTd5);
  // input要素を作成し、td要素に追加する
  const input4 = document.createElement('input');
  // 属性typeにtext、クラス'form-control'をinputタグに追加
  input4.type = 'text';
  input4.classList.add('form-control');
  input4.size = '3';
  input4.name = 'units['+(additionalPurchase-1)+']';
  input4.style.textAlign = 'right';
  newTd5.appendChild(input4);
  
  
  
  
  // td要素を追加する（勘定科目）
  const newTd6 = document.createElement('td');
  newTr.appendChild(newTd6);
  // select要素を作成し、td要素に追加する
  const select2 = document.createElement('select');
  newTd6.appendChild(select2);
  // 'form-control' クラスをselectタグに追加
  select2.classList.add('form-control');
  // name属性をselectタグに追加
  select2.setAttribute("name", "account_id["+(additionalPurchase-1)+"]");


// accounts 配列を定義する
const accounts = [
  { id: 1, account: '消耗品費' },
  { id: 2, account: '備品費' },
  { id: 3, account: '印刷費' },
  { id: 4, account: '雑費' },
];       
// accounts 配列の要素をループ処理する
accounts.forEach(account => {
// optionタグを作成する
const option2 = document.createElement('option');
// optionタグのテキストを設定
option2.textContent = account.account;
// optionタグの value 属性を設定
option2.value = account.id;
// optionタグを select 要素に追加する
select2.appendChild(option2);
});
  
  //  削除アイコン
  const newTdClose = document.createElement('td');
  newTdClose.classList.add('close-icon','clear-column');
  newTdClose.textContent = '✖';
  newTr.appendChild(newTdClose);
  
  
 
  // 「✖」をクリックしたときの処理を追加
  newTdClose.addEventListener('click', () => {
   newTr.remove();
  });

  return newTr;
}

// 「✖」をクリックしたときの処理
const items = document.querySelectorAll('.item');
const closeIcons = document.querySelectorAll('.close-icon');
for (let j = 0; j < closeIcons.length; j++) {
  closeIcons[j].addEventListener('click', () => {
    items[j].remove();
  });
}

    
  
// 要素を取得し（どこの？何を？）変数宣言をしておく。
// querySelectorAllを使用して配列として処理する
let input1 = document.querySelectorAll(`input[name^='unit_purchase_price']`);
let input2 = document.querySelectorAll(`input[name^='purchase_quantities']`);
const subtotal = document.querySelector("input[name=subtotal]");
const tax_amount = document.querySelector("input[name=tax_amount]");
const total_amount = document.querySelector("input[name=total_amount]");
let consumables_equipment = document.querySelectorAll(`select[name^='consumables_equipment_id']`);

// 消費税率の変数宣言
const tax10 =0.1
const tax8 =0.08


// アロー関数にて計算の関数定義を行う。
// 小計の計算
const calc_subtotal = ()=>{
  let subtotal_price = 0;
  input1 = document.querySelectorAll(`input[name^='unit_purchase_price']`);
  input2 = document.querySelectorAll(`input[name^='purchase_quantities']`);
  for(let i = 0;input1.length>i;i++){
  subtotal_price += Number(input1[i].value.replace(/,/g, '')) * Number(input2[i].value);
  }

subtotal.value = Math.round(subtotal_price).toLocaleString();
calc_total_amount();
}; 


// 消費税の計算（条件式）
const calc_tax_amount =()=>{
  input1 = document.querySelectorAll(`input[name^='unit_purchase_price']`);
  input2 = document.querySelectorAll(`input[name^='purchase_quantities']`);
  consumables_equipment = document.querySelectorAll(`select[name^='consumables_equipment_id']`);
let sum_tax_amount = 0;
for(let i = 0;input1.length>i;i++){
let taxableAmount = Math.floor(Number(input1[i].value.replace(/,/g, '')) * Number(input2[i].value));

        if (consumables_equipment[i].value == 5) {
            sum_tax_amount += Math.floor(taxableAmount * tax8);
        } else {
            sum_tax_amount += Math.floor(taxableAmount * tax10);
        }
    }

    // カンマ表示に変換して再設定
    tax_amount.value = sum_tax_amount.toLocaleString();
    calc_total_amount();
};




// 小計+消費税＝発注金額合計
const calc_total_amount = () => {
  // カンマを取り除いてから数値に変換
const subtotalValue = Number(subtotal.value.replace(/,/g, ''));
const taxAmountValue = Number(tax_amount.value.replace(/,/g, ''));

// 小計と消費税を足して、結果を表示
const totalValue = subtotalValue + taxAmountValue;

// カンマ表示に変換して再設定
total_amount.value = totalValue.toLocaleString();
};





// 発生条件をaddEventListenerで入力されたら表示させる（関数の実行）
input1.forEach(element => {
    element.addEventListener("change", calc_tax_amount, false)
    element.addEventListener("change", calc_subtotal, false)
});

input2.forEach(element => {
    element.addEventListener("change", calc_tax_amount, false)
    element.addEventListener("change", calc_subtotal, false)
});


consumables_equipment.forEach(element => {
  element.addEventListener("change", calc_tax_amount, false)
  element.addEventListener("change", calc_subtotal, false);  
});

// consumables_equipment.addEventListener("change", calc_total_amount);

// メールアドレスを取得し指定のinputタグに渡す処理
// let choiceEmail = "test@example.email";//ここに選択したEメールが来るように設定
const choiceButton = (mailAddress) => {
  let inputDestination = document.querySelector(".choice-email");//指定したEメールアドレスを代入させる
  inputDestination.value =mailAddress;
  };

// エンターキーを押してもsubmit送信されないようにする
 document.getElementById("search-input").addEventListener('keydown', function(e) {
 if (e.key == 'Enter') {
  e.preventDefault();
  // 検索機能を開始する
  performSearch();
 }
 });

 // 検索機能
 function performSearch(){
  const userName = $("#search-input").val();
  // 検索ワードが空欄の場合は何もせずに処理を終了
  if (!userName.trim()) {
      return;
  }
  $.ajax({
      type: "GET",
      dataType: 'json',
      async: true,
      url: '../search_destination',
      data: {'search': userName},
  })
  .done((data) => {
      // データがダウンロードできたときの処理
      console.log(data);
      let tbody = $('#destination_body').empty()
      for(let i=0; i<data.names.length; i++){
      let user = data.names[i];
      console.log(user);
      if(user.department && user.department.length > 0){
      tbody.append('<tr><td>'+user.id+'</td><td>'+user.name+'</td><td>'+user.department[0].department_name+'</td><td>'+user.email+'</td><td><button type="button" class="btn btn-outline-primary" onclick="choiceButton(\'' + user.email + '\')" data-bs-dismiss="modal">選択</button></td></tr>');
      }};
      
      // 取得したデータを使って検索結果を表示する例
      if (data.length > 0) {
          // 検索結果がある場合の処理
          // ここで取得したデータを使って、検索結果を表示するためのコードを追加
          
      } else {
          // 検索結果がない場合の処理
          console.log('該当する結果がありません。');
      }
  })
  .fail((error) => {
      // データがダウンロードできなかったときの処理
      console.error('検索エラー:', error);
  });
 };