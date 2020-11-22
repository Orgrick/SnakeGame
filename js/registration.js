const regForm = document.querySelector('#regForm')

regForm.addEventListener('submit', (e) => {
    e.preventDefault()
    const formData = new FormData(regForm);
    postData('fetch/fetch_reg.php',formData).then(data =>{
        if(data == 'Готово'){
            const successBlock =`<div class="alert alert-success mt-2 w-50 " role="alert">
                                  Вы успешно зарегестрировались! Теперь вы можете войти на сайт импользуя свой логин и пароль
                                 </div>`
            document.querySelector('#password').insertAdjacentHTML('afterend',successBlock)
            document.querySelector('#reg_user').remove();
        }else {
            document.querySelector('#error_block').innerHTML = data
            document.querySelector('#error_block').style.display = 'block'
            setInterval(()=>{
                document.querySelector('#error_block').style.display = 'none'
            },3000)
        }
    }).catch(()=>{
        document.querySelector('#error_block').innerHTML = 'Серевер недоступен, попробуйте позже'
        document.querySelector('#error_block').style.display = 'block'
        setInterval(()=>{
            document.querySelector('#error_block').style.display = 'none'
        },3000)
    })
})