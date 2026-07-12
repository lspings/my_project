const form = document.getElementById("loginForm");

form.addEventListener("submit", async function (e) {

    e.preventDefault();


    const formData = new FormData(form);


    try {

        const response = await fetch("api/login.php", {

            method: "POST",

            body: formData

        });


        const result = await response.json();


        if (result.success) {

            location.href = "index.php";


        } else {


            document.getElementById("error").innerText =
                result.message;


        }


    } catch (error) {


        document.getElementById("error").innerText =
            "서버 오류가 발생했습니다.";


        console.error(error);


    }


});