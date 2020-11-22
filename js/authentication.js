if(document.querySelector('#authForm')){
    const authForm = document.querySelector('#authForm')
    authForm.addEventListener('submit',e => {
        e.preventDefault()
        console.log('ok')
        const formData = new FormData(authForm);
        postData('fetch/fetch_auth.php',formData).then(data => {
            if(data == 'Готово'){
                const successBlock =`<div class="alert alert-success mt-2 w-50 " role="alert">
                                  Вход выполнен, сейчас страница перезагрузится
                                 </div>`
                document.querySelector('#pass').insertAdjacentHTML('afterend',successBlock)
                setTimeout(()=>{
                    window.location.reload()
                },1000)
            }
            else {
                document.querySelector('#error_block').style.display = 'block'
                document.querySelector('#error_block').innerHTML = data
            }
        }).catch(()=>{
            document.querySelector('#error_block').innerHTML = 'Серевер недоступен, попробуйте позже'
            document.querySelector('#error_block').style.display = 'block'
            setInterval(()=>{
                document.querySelector('#error_block').style.display = 'none'
            },3000)
        })
    })
}
if(document.querySelector('#exit_btn')){
    document.querySelector('#exit_btn').addEventListener('click',()=>{
        getResourse('fetch/exit.php').then(data =>{
            if(data = "true"){
                window.location.reload()
            }
        }).catch(()=>{
            document.querySelector('#error_block').innerHTML = 'Серевер недоступен, попробуйте позже'
            document.querySelector('#error_block').style.display = 'block'
            setInterval(()=>{
                document.querySelector('#error_block').style.display = 'none'
            },3000)
        })
    })
}
