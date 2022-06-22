// FILE CSS
// ***************************************
const header = document.getElementById( 'header' )

function cssFile ()
{
    if ( header )
    {
        setTimeout(logger, 2000)
        require('../../styles/resource/header.css')
    }
    console.log( 'header est en cour de charge ...' );
}

const logger = ( () =>
{
    console.log('header est charger')
})


export {cssFile}
