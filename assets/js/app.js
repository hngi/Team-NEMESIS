const showMobileNav = () => {
    const nav = document.querySelector(".js-nav");
    const hamburger = document.querySelector(".js-hamburger");

    hamburger.addEventListener("click", e => {
        nav.classList.toggle("nav--open");
    });
};

showMobileNav();

//add asset and value to the assets list
let assetArr = [];
let assetCount = 0;
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
                        <!--<button type="submit" class="btn button&#45;&#45;primary remove-btn">Remove</button>-->
                    </div>`;

    //append the div
    assets.appendChild(div);
    assetCount = assetCount + 1;
    assetArr.push([assetCount, assetName.value, parseFloat(assetValue.value).toFixed(2)]);

    //clear input fields
    assetName.value = "";
    assetValue.value = "";

    e.preventDefault();
});

//add liability and value to the liabilities list
let liabilityArr = [];
let liabilityCount = 0;
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
                        <!--<button type="submit" class="btn button&#45;&#45;primary remove-btn">Remove</button>-->
                    </div>`;

    //append the div
    liabilities.appendChild(div);
    liabilityCount = liabilityCount + 1;
    liabilityArr.push([liabilityCount, liabilityName.value, parseFloat(liabilityValue.value).toFixed(2)]);
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
//cache inputs
const assets = document.getElementsByClassName('asset');
const liabilities = document.getElementsByClassName('liability');

//cache outputs
const netWorth = document.getElementById('net-worth');

function calculateResults(e) {
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

//Generate Report
generate = function()
{
    let doc = new jsPDF();
    doc.setFontSize(16);
    doc.setFontStyle('bold');
    doc.text('Nemesis Net Worth Report', 14, 16);

    doc.setFontSize(12);
    doc.setFontStyle('normal');
    doc.text('Assets', 14, 24);

    doc.autoTable({
        head: [['S/N', 'Asset Name', 'Asset Value(NGN)']],
        body: assetArr,
        startY: 28
    });

    doc.text('Liabilities', 14, doc.autoTable.previous.finalY + 10);
    doc.autoTable({
        head: [['S/N', 'Liability Name', 'Liability Value(NGN)']],
        body: liabilityArr,
        startY: doc.autoTable.previous.finalY + 14
    });
    doc.text('Net Worth Overview', 14, doc.autoTable.previous.finalY + 10);
    doc.autoTable({
        body: [
            ['Total Assets', 'NGN ' + parseFloat(sumArray(convertColToArr(assets))).toFixed(2)],
            ['Total Liabilities', 'NGN ' + parseFloat(sumArray(convertColToArr(liabilities))).toFixed(2)],
            ['Net Worth', 'NGN ' + parseFloat((parseFloat(sumArray(convertColToArr(assets))).toFixed(2))-(parseFloat(sumArray(convertColToArr(liabilities))).toFixed(2))).toFixed(2)]
        ],
        showHead: false,
        // Note that the "id" key below is the same as the column's dataKey used for
        // the head and body rows. If your data is entered in array form instead you have to
        // use the integer index instead i.e. `columnStyles: {5: {fillColor: [41, 128, 185], ...}}`
        columnStyles: {
            0: {fillColor: [41, 128, 185], textColor: 255, fontStyle: 'bold'}
        },
        startY: doc.autoTable.previous.finalY + 14
    });
    doc.output('dataurlnewwindow');
};