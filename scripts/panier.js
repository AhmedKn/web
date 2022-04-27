const disp=(product)=>{
    var json_str = localStorage.getItem('PANIER');
    var a = JSON.parse(json_str);
    if(a===null || a===undefined || a.length===0 || a===[]){
        var arr = [];
        arr.push(product);
        var json_str = JSON.stringify(arr);
        localStorage.setItem('PANIER', json_str);
    }else{
        // var a = JSON.parse(json_str);
        a.push(product);
        var json_str = JSON.stringify(a);
        localStorage.setItem('PANIER', json_str);
    }
}
function updateQuan(){
    let arr=[];
    let quan=document.getElementsByClassName("item-number");
    let k=true;
    var i=0;
    while(k){
        let ppp=parseInt(quan[i].innerHTML);
        if(ppp>=1){
            arr.push(ppp);
            i=i+1;
            var json_str = localStorage.getItem('PANIER');
            var a = JSON.parse(json_str);

            a.map((el,i) =>{el.quantite=arr[i];console.log(el.quantite)})
            var upquan = JSON.stringify(a);
            localStorage.setItem('PANIER', upquan);
            console.log(upquan);
                    console.log(arr);
        }
        else{
            k=false;
        }
    }    
   
}
function updatecart() {
    var total = 0;
  var cartitemcont = document.getElementsByClassName('cart-container')[0]
  var cartrows = cartitemcont.getElementsByClassName('cart-product-card')
  for (var i = 0; i < cartrows.length; i++)
  {
    var cartrow = cartrows[i]
    var priceelemnt = cartrow.getElementsByClassName('item-price')[0]
    var quantityelement = cartrow.getElementsByClassName('item-number')[0]
    var price = parseFloat(priceelemnt.innerText.replace('TND', ''))
    var quantity =parseFloat(quantityelement.innerText)
    var total = total + (price*quantity)
   document.getElementById('thecost').innerText =total + "TND";
  }
  if (total == 0){
  let div=document.createElement("div");
  div.classList.add("cart-empty-container");
  let h2=document.createElement("h2");
  h2.appendChild(document.createTextNode('Votre panier est vide !'));
  div.appendChild(h2);
  cart.appendChild(div)
  let tot=document.getElementById("total-price-section")
  tot.remove();
}
  }
var json_str = localStorage.getItem('PANIER');
var arr = JSON.parse(json_str);
let cart=document.getElementsByClassName("cart-content")[0];
if(arr===null || arr===undefined || arr.length===0 || arr===[]){
    let div=document.createElement("div");
    div.classList.add("cart-empty-container");
    let h2=document.createElement("h2");
    h2.appendChild(document.createTextNode('Votre panier est vide !'));
    div.appendChild(h2);
    cart.appendChild(div)
}
else{
    let div=document.createElement("div");
    div.classList.add("cart-container");
    arr.map(el=>{
        let div2=document.createElement("div");
        div2.classList.add("cart-product-card");
        //add image
        let img=document.createElement("img");
        img.src=el.img;
        div2.appendChild(img);
        //add libelle
        let p=document.createElement("p");
        p.classList.add("libelleprod")
        p.appendChild(document.createTextNode(el.lib));
        div2.appendChild(p);
        let div3=document.createElement("div");
        div3.classList.add("cruds-sec")
        //add plus button
        let btn = document.createElement("button");
        btn.classList.add("plus");
        btn.innerHTML = "+";
        div3.appendChild(btn);
        //add quantity
        let q=document.createElement("span");
        q.classList.add("item-number")
        q.appendChild(document.createTextNode(el.quantite));
        div3.appendChild(q);
        //add minus button
        let btn2 = document.createElement("button");
        btn2.classList.add("minpop");
        btn2.innerHTML = "-";
        div3.appendChild(btn2);
        //add price
        let price=document.createElement("p");
        price.classList.add("item-price");
        price.appendChild(document.createTextNode(`${el.prixpromo>0?el.prixpromo:el.prix}TND`));
        div3.appendChild(price);
        //add remove button
        let rem=document.createElement("button");
        rem.classList.add("X");
        rem.innerHTML = "X";
        div3.appendChild(rem);
        div2.appendChild(div3)
        //add all to the card
        div.appendChild(div2);

    })
   cart.appendChild(div);
    //  </i>Shopping Bag Total: <span id="thecost">1800$</span></p>
    let tot=document.createElement("div");
    tot.classList.add("total-price-section");
    tot.setAttribute("id","total-price-section");
    let tit=document.createElement("p");
    tit.appendChild(document.createTextNode("Total :"));
    tot.appendChild(tit)
    
    let total=document.createElement("span");
    total.setAttribute("id","thecost");
    //add button commander
    let cmnd=document.createElement("button");
    cmnd.setAttribute("id","commandbtn")
    cmnd.appendChild(document.createTextNode("Commander"));
    tot.appendChild(total)
    tot.appendChild(cmnd)
    cart.appendChild(tot)
    updatecart();
    //functionnalities
    var remove = document.getElementsByClassName('X');
    for (var i = 0; i < remove.length; i++){
            remove[i].addEventListener('click', function(event) {
            var but = event.target
            but.parentElement.parentElement.remove();
            arr.splice(remove.length,1)
            var json_str = JSON.stringify(arr);
            localStorage.setItem('PANIER', json_str);
            updatecart();
            updateQuan();
            })
}
}
function updatecart1() {
    var total = 0;
    var cartitemcont = document.getElementsByClassName('cart-container')[0]
    var cartrows = cartitemcont.getElementsByClassName('cart-product-card')
  for (var i = 0; i < cartrows.length; i++)
  {
    var cartrow = cartrows[i]
    var priceelemnt = cartrow.getElementsByClassName('item-price')[0]
    var quantityelement = cartrow.getElementsByClassName('item-number')[0]
    var price = parseFloat(priceelemnt.innerText.replace('TND', ''))
    var quantity =parseFloat(quantityelement.innerText)
    var total = total - (price*quantity)
   document.getElementById('thecost').innerText = - total + "TND";
  }
  }
  function minone(){
    var add = document.getElementsByClassName('minpop')  
     for(let el of add){
       el.addEventListener("click",function(){
        var a = el.previousElementSibling.innerText--;
         if (el.previousElementSibling.innerText==0){
         el.previousElementSibling.innerText = 1;}
         updatecart1();
         updateQuan();
       })
     }
  }
  addEventListener('click',minone())
  function addone(){
    var add = document.getElementsByClassName('plus')  
     for(let el of add){
       el.addEventListener("click",function(){
         el.nextElementSibling.innerText++;
         updatecart();
         updateQuan();
       })
     }
  }
  addEventListener('click',addone());
  if(arr!==null || arr!==undefined || arr.length!==0 || arr!==[]){
    let btn=document.getElementById("commandbtn");
    btn.addEventListener("click",function(){
        let user=localStorage.getItem("user");
        if(user===undefined || user===null || user==="not connected"){
            
        }
        else{
            var id = localStorage.getItem('id');
            let cost=document.getElementById("thecost").innerHTML;
            cost=cost.replace("TND","");
            localStorage.setItem("cost",cost);
            let prod=localStorage.getItem("PANIER");
             window.location.href=`/route/commander.php?id=${id}&cost=${cost}&prod=${prod}`;
        }
    })
    }