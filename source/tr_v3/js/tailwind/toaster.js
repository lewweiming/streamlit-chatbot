/*
- Version 0.2
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

        document.getElementById('toasts').appendChild(node);

        window.setTimeout(() => {
            this.hideNode(node)
        }, 3000)
        
    }

    hideNode(node)
    {
        node.remove()
    }

    generateNode(options)
    {
        let placeholder = document.createElement('DIV');
        
        let tpl = `
<div class="my-3 bg-white shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
<div class=" bg-${options.class} flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-gray-200 rounded-t-lg">
<p class="font-bold text-${options.class}-500">Notification</p>
</div>
<div class="p-3 bg-white rounded-b-lg break-words text-gray-700">
${options.message}
</div>
</div>        
        `;

        placeholder.innerHTML = tpl

        let node = placeholder.firstElementChild

        return node;
    }

}