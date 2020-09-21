// Raring formularza

document.querySelector('input.range').addEventListener('input', function () {

    let r = this.value;

    const hook = document.getElementById('valBox');



    hook.innerHTML = r;
    // hook.appendChild('sdsd');
});