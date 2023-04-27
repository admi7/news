const { doms } = require( "../DOM" );
const { slidersAnimes } = require( "./funcAnimes" );


module.exports = function allAnimations ()
{
    slidersAnimes( doms[ 'query' ]( '#slideBarArticles' ) );

    const cols = [ 'green', 'blue', 'yellow', 'red' ];
    // pubH = doms[ 'query' ]( 'pub-header', 'id' );
    // console.log( pubH.classList );

    // for ( const col of cols )
    // {
    //     setTimeout( () =>
    //     {
    //         console.log( col );
    //         pubH.style.backgroundColor = col;
    //     }, 3000 );
    // }

    // div de la publicité globale ...
    const pub = doms[ 'creat' ]( 'div', [ 'h-100', 'ccb', 'display-m-900', 'blue' ] );
    // partie de la description du boutique => dans "pub"
    const desc = doms[ 'creat' ]( 'div', [ 'w-100', 'h-100', 'ccb', 'line' ] );
    // partie de la div qui contient le link de la pub vers son page
    const contentLInk = doms[ 'creat' ]( 'div', [ 'rr', 'w-100' ] );
    // partie top de la div de publicité
    const lineProfile = doms[ 'creat' ]( 'div', [ 'fcb', 'w-100' ] );
    doms[ 'attr' ]( lineProfile, 'style', 'height: 80px;' );

    // construction de la lingne de profile ...
    /*
        un image de sa tof
        son nom
    */
    const picture = doms[ 'creat' ]( 'img', [ 'blue' ] );
    doms[ 'attr' ]( picture, 'src', '' );
    doms[ 'attr' ]( picture, 'alt', 'logo' );
    doms[ 'attr' ]( picture, 'style', 'width: 50px; height: 50px; border-radius: 50%; margin: 5px' );

    // const prgName = doms[ 'creat' ]( 'p', [ 'p' ], null );
    const prgName = doms[ 'creat' ]( 'p', [ 'p' ] );
    doms[ 'text' ]( prgName, 'name of propriétaire' );



    const h1 = doms[ 'creat' ]( 'h1', [ 'line', 'big-title', 'w-100' ] );
    const h2 = doms[ 'creat' ]( 'h2', [ 'smoll-title' ] );
    const prg1 = doms[ 'creat' ]( 'p', [ 'p' ] );
    const link1 = doms[ 'creat' ]( 'a', [ 'btn', 'btn-secondary' ] );

    doms[ 'attr' ]( link1, 'href', '#link-to-shop' );

    doms[ 'text' ]( h1, 'titre de la pub : genre boutique !' );
    doms[ 'text' ]( h2, 'le sous titre de la boutique !' );
    doms[ 'text' ]( link1, 'link' );
    doms[ 'text' ]( prg1, 'description de la pub test' );

    contentLineProfile = [ picture, prgName ];
    const html = [ lineProfile, h1, h2, desc ];
    const descComposant = [ prg1, contentLInk ];

    // doms[ 'append' ]( pub, contentLIneProfile );
    doms[ 'append' ]( doms[ 'query' ]( 'pub-header', 'id' ), [ pub ] );
    doms[ 'append' ]( contentLInk, [ link1 ] );
    doms[ 'append' ]( lineProfile, contentLineProfile );
    doms[ 'makes' ]( pub, html );
    doms[ 'makes' ]( desc, descComposant );

    console.log( desc );

};
