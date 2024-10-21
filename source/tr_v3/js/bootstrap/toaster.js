/*
- Works with Bootstrap 5.2
- options

Usage:
const toaster = new Toaster()
toaster.pop({message: 'my message',class: 'success'})

*/
class Toaster
{
    pop(options) 
    {
        let node = this.generateNode(options);

        document.getElementById('flash').appendChild(node);

        let toast = new bootstrap.Toast(node)
        toast.show()
    }

    generateNode(options)
    {
        let placeholder = document.createElement('DIV');
        
        let tpl = `

    <div class="toast align-items-center text-bg-${options.class} border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            ${options.message}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>        

        `;

        placeholder.innerHTML = tpl

        let node = placeholder.firstElementChild

        return node;
    }

}