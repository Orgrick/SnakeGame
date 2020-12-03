function gameInit() {
    const canvas = document.querySelector('#game')
    const ctx = canvas.getContext('2d')
    let startTime = 0
    let time = 0
    let dir

    // if(document.querySelector('#game').style.display =="block"){
        document.addEventListener("keydown",e =>{
            if(startTime == 0){
                startTime = new Date().getTime()/1000
                setInterval(()=>{
                    time = Math.floor(new Date().getTime()/1000 - startTime)
                },1000)
            }
            if(e.keyCode === 37 && dir != "right")
                dir = "left"
            else if(e.keyCode === 38 && dir != "down")
                dir = "up"
            else if(e.keyCode === 39 && dir != "left")
                dir = "right"
            else if(e.keyCode === 40 && dir != "up")
                dir = "down"
        })
    // }

    const ground = new Image()
    ground.src = "img/gameBoard.png"

    const foodImage = new Image()
    foodImage.src = "img/food.png"


    const box = 32
    let score = 0
    let food = {
        x: Math.floor((Math.random() * 17 + 1)) * box,
        y: Math.floor((Math.random() * 15 + 3)) * box
    }

    const snake = []
    snake[0] = {
        x: 9 * box,
        y: 10 * box
    }

    function eatTail(head,arr) {
        arr.forEach(item =>{
            if(head.x == item.x && head.y == item.y){
                endGame()
            }
        })
    }
    function GameRender() {
        ctx.drawImage(ground,0,0)

        ctx.drawImage(foodImage, food.x,food.y)

        snake.forEach(item => {
            ctx.fillStyle = snake.indexOf(item) == 0 ? 'red' : 'green'
            ctx.fillRect(item.x, item.y, box,box)
        })

        ctx.fillStyle="White"
        ctx.font = "50px Arial"
        ctx.fillText(`Счет: ${score}`,box* 2.5,box * 1.7)

        ctx.fillStyle="White"
        ctx.font = "50px Arial"
        ctx.fillText(`Время: ${time}`,box* 10.5,box * 1.7)



        let snakeX = snake[0].x
        let snakeY = snake[0].y

        if(snakeX == food.x && snakeY == food.y){
            score++
            food = {
                x: Math.floor((Math.random() * 17 + 1)) * box,
                y: Math.floor((Math.random() * 15 + 3)) * box
            }
        }else {
            snake.pop();
        }

        if(snakeX < box || snakeX > box * 17 ||
            snakeY < 3 * box || snakeY > box * 17) {
            endGame()
        }

        if(dir ==  "left") snakeX -= box
        if(dir ==  "right") snakeX += box
        if(dir ==  "up") snakeY -= box
        if(dir ==  "down") snakeY += box

        let newHead = {
            x: snakeX,
            y: snakeY
        }

        eatTail(newHead,snake)
        snake.unshift(newHead)
    }
    function endGame(){
        clearTimeout(startTime)
        clearInterval(game)
        recordGame(score,time)
        document.querySelector('.modal').style.display = 'block'
        const result = `Счет: ${score} Время: ${time}с`
        document.querySelector('#result').innerText = result
    }
    let game = setInterval(GameRender,100)
}
document.querySelector('#PlayBtn').addEventListener('click',()=>{
    document.querySelector('#PlayBtn').style.display ="none"
    document.querySelector('#game').style.display ="block"
    gameInit()
})
document.querySelector('#close__modal').addEventListener('click',()=>{
    document.querySelector('.modal').style.display = 'none'
    document.querySelector('#PlayBtn').style.display ="block"
    document.querySelector('#game').style.display ="none"
})
document.querySelector('#play__again').addEventListener('click',()=>{
    document.querySelector('.modal').style.display = 'none'
    gameInit()
})

function recordGame(score,time){

    const Data = {
        score,
        time
    }
    const prepData = JSON.stringify(Data)
    postData('fetch/record_game.php',prepData).then(data=>{
        if(data == 'notAuth'){
            document.querySelector('#result').insertAdjacentHTML('afterend',`<p id="errorMsg"></p>`)
            document.querySelector('#errorMsg').style.display = "block"
            document.querySelector('#errorMsg').innerText = `Зарегестрируйтесь или войдите, что бы сохранять свои игры`
            setTimeout(()=>{
                document.querySelector('#errorMsg').remove()
            },2000)
        }else {
            if (data == 'OK'){
                document.querySelector('#result').insertAdjacentHTML('beforeend',`<br>Игра добавлена в исторю`)
            }
        }

    }).catch(e =>{
        document.querySelector('#result').insertAdjacentHTML('afterend',`<p id="errorMsg"></p>`)
        document.querySelector('#errorMsg').style.display = "block"
        document.querySelector('#errorMsg').innerText = `Сервер недоступен, результат не сохранен`
    })
}

