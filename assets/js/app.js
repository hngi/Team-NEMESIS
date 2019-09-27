const showMobileNav = () => {
  const nav = document.querySelector(".js-nav");
  const hamburger = document.querySelector(".js-hamburger");

  hamburger.addEventListener("click", e => {
    nav.classList.toggle("nav--open");
  });
};

showMobileNav();

//add asset and value to the assets list
document.getElementById('add-asset-form').addEventListener('submit', function (e) {
    //cache add-asset-form UI vars
    let assets = document.getElementById('assets');
    let assetName = document.getElementById('asset-name');
    let assetValue = document.getElementById('asset-value');

    //create a div with asset parameters and append to assets list
    let div = document.createElement('div');
    div.className = 'form-group col-md-12';
    div.innerHTML = `<div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">${assetName.value}</span>
                        </div>
                        <input type="number" class="form-control asset" value="${assetValue.value}">
                        <button type="submit" class="btn button--primary remove-btn">Remove</button>
                    </div>`;

    //append the div
    assets.appendChild(div);

    //clear input fields
    assetName.value = "";
    assetValue.value = "";

    e.preventDefault();
});

//add liability and value to the liabilities list
document.getElementById('add-liability-form').addEventListener('submit', function (e) {
    //cache add-liability-form  UI vars
    let liabilities = document.getElementById('liabilities');
    let liabilityName = document.getElementById('liability-name');
    let liabilityValue = document.getElementById('liability-value');

    //create a div for append to liabilities list
    let div = document.createElement('div');
    div.className = 'form-group col-md-12';
    div.innerHTML = `<div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">${liabilityName.value}</span>
                        </div>
                        <input type="number" class="form-control liability" value="${liabilityValue.value}">
                        <button type="submit" class="btn button--primary remove-btn">Remove</button>
                    </div>`;

    //append the div
    liabilities.appendChild(div);

    //clear input fields
    liabilityName.value = "";
    liabilityValue.value = "";

    e.preventDefault();
});

//remove from assets list
document.getElementById('assets').addEventListener('click', removeFromList);

//remove from liabilities list
document.getElementById('liabilities').addEventListener('click', removeFromList);

//remove an item from the lists by clicking remove btn
function removeFromList(e){
    if (e.target.classList.contains('remove-btn')){
        e.target.parentElement.parentElement.remove();
    }
    e.preventDefault();
}

//event for calculate btn
document.getElementById('calculate-button').addEventListener('click', calculateResults);

//calculate results
function calculateResults(e) {
    //cache inputs
    const assets = document.getElementsByClassName('asset');
    const liabilities = document.getElementsByClassName('liability');

    //cache outputs
    const netWorth = document.getElementById('net-worth');

    //calculations
    const totalAssets = parseFloat(sumArray(convertColToArr(assets))).toFixed(2);
    const totalLiabilities = parseFloat(sumArray(convertColToArr(liabilities))).toFixed(2);
    netWorth.innerText = (totalAssets - totalLiabilities).toFixed(2);

    e.preventDefault();
}

//add all the values in an array
function sumArray(arr){
    if (arr && arr.length) {
        return arr.reduce(function (a, b) {
            return a + b;
        })
    } else {
        return 0;
    }
}

//convertHtmlCollectionToArray
function convertColToArr(col) {
    let assetArr = [];
    for (let i = 0; i < col.length; i++) {
        let inputValue = parseFloat(col[i].value);
        if (isNaN(inputValue)){
            assetArr.push(0);
        } else {
            assetArr.push(inputValue);
        }
    }
    return assetArr;
}