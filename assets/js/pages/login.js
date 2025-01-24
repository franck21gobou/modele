setInterval(()=>{
    $('#now').html(moment().format('dddd Do MMMM  YYYY, h:mm:ss '));
  }, 1000)
  const sanlam = () =>{
    const element = document.querySelector('#logo');
    element.classList.add('animate__animated', 'animate__rotateIn');
  }

// pages
$("#loginForm").submit((e)=>{
    e.preventDefault()
    
    let input = [
        {key: 'user', value: $('#username').val() },
        {key: 'mdp', value: $('#userpassword').val() },
        {key: 'stay', value: $('#stay:checked').length},
    ]
    asyncPost("./api/login/login", input, "loginBtn", true)
    .then(reponse =>{
       if (reponse.result ){
         notifyMy(reponse.infos, 'green')
         connectNow(reponse)
        }
       
    })
})