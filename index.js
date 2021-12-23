const form = document.getElementById("contactForm");
form.addEventListener("submit", formSend);

async function formSend(e){
    e.preventDefault();

    let formData = new FormData(form);
    
    let response = await fetch('sendMail.php', {
        method: "POST",
        body: formData
    });
 
    if(response.ok){
        let result = await response.json();
        alert(result.message);
        form.reset();
    }else{
        alert("Error");
    }

}