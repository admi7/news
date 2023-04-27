const { doms } = require( "./DOM" );
const $ = require( "jquery" );


const cards = doms[ 'query' ]( '.card-annonce', 'all' );
const containerAnnonces = doms[ 'query' ]( '.container-annoces' );

// console.log( 'coucou' );
// containerAnnonces.remove( cards );

// console.log( $( 'container-annoces' ) );

const callSetTimeout = ( callback, time ) =>
{
    setTimeout( callback, time );
};

function test ()
{
    console.log( 'je suis le function test ... ! ' );
}

module.exports = function annoncesSection ()
{
    window.addEventListener( 'load', () =>
    {
        var annonces = containerAnnonces.children;
        for ( const annonce of annonces )
        {
            // console.log( annonce );
            callSetTimeout( test, 2000 );
        }
    } );
};
