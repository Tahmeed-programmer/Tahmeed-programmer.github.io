const navLis = document.querySelectorAll('.absolute li')
const labels = document.querySelectorAll('.form-control label')
const txt = document.getElementById('txt');
const txt1 = document.getElementById('txt1');
const toggle = document.querySelector('#toggle')
const nav = document.querySelector('#nav')

var mflag=nFlag=false;

labels.forEach(label => {
    label.innerHTML = label.innerText
        .split('') //splits letters into an array
        .map((letter, idx) => `<span class="sp-animation" style="transition-delay:${idx*50}ms">${letter}</span>`) //forms array of spans
        .join('') //converts it back to a string
})

toggle.addEventListener('click', () => {
    nav.classList.toggle('active')
})

function checkFN(n) {
    var nameExp=/^[a-z_0-9]{6,200}$/;
    if (n.length==0) {
    m="";
    nFlag=false;
    }
    else if (!nameExp.test(n)) {
        m="Sorry, username is invalid ";
        c="#e63946";
        nFlag=false;
    }
    else {
        m="Hooray! Username is valid ";
        c="#06d6a0";
        nFlag=true;
    }
    txt.style.borderColor = c;
    txt.innerHTML= m;
} 

function checkpass(p) {
    var exp1=/^[a-z_0-9\.]{6,}$/;
    if(p.length==0){
        m='';
        mflag=false;
    }
    else if (!exp1.test(p))
    {
        m='Sorry, password is invalid';
        c='#e63946';
        mflag=false;

    }
    else {
        m='Hooray! Password is valid';
        c='#06d6a0';
        mflag=true;
    }
    txt1.style.borderColor = c;
    txt1.innerHTML= m;
}

function checkUserInputs() {
    return (nFlag && mflag );
}

// function activeHeader() {
//     if (document.URL.includes('customer')) {
//         navLis.forEach(li => {
//             if (li.classList.contains('customer')) {
//                 li.classList.add('active-h')
//             }
//         })
//     }
//     else if (document.URL.includes('admin')) {
//         navLis.forEach(li => {
//             if (li.classList.contains('admin')) {
//                 li.classList.add('active-h')
//             }
//         })
//     }
//     else if (document.URL.includes('staff')) {
//         navLis.forEach(li => {
//             if (li.classList.contains('staff')) {
//                 li.classList.add('active-h')
//             }
//         })
//     }
// }

// activeHeader()