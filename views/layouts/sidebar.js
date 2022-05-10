// (function () {
//     let sidebarOpen = false
//     let button = document.querySelector('#menu')
//     button.addEventListener('click', function (e) {
//         e.stopPropagation()
//         e.preventDefault()
//         document.body.classList.add('has-sidebar')
//         sidebarOpen = true
//     })

//     document.bidy.addEventListener('click', function () {
//         if (sidebarOpen) {
//             document.body.classList.remove('has-sidebar')
//         }
//     })
// })()


<script>
    $(document).ready(function(){
        $('#icon').click(function () {
            $('ul').toggleClass('show');
        })
    })
</script>