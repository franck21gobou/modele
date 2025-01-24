const generateurAstuces = astuce => {
    setTimeout(() => {
        $("#astuces-div").html(
            `<div style="max-width: 300px;">
            <marquee behavior="" direction="" style="background-color: blue; color:aliceblue;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-style:italic">
                Astuce 😃: ${astuce}
            </marquee>
        </div>`
        )
    }, 2000);
    
}