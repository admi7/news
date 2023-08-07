const { doms } = require( "../DOM" );


module.exports = class Pub
{
    title;
    name;
    location;
    number;
    img;
    description;
    link;

    constructor ( name, number, location, title, img = null, description = null, link, )
    {
        this.location = location;
        this.name = name;
        this.number = number;
        this.title = title;
        this.img = img;
        this.description = description;
        this.link = link;
    }

    getName ()
    {
        return this.name;
    }

    getNUmber ()
    {
        return this.number;
    }

    getLocation ()
    {
        return this.location;
    }

    getTitle ()
    {
        return this.title;
    }

    getImg ()
    {
        return this.img ?? null;
    }

    getDescription ()
    {
        console.log( this.description );
        if ( this.description == null || this.description == undefined )
        {
            console.log( "descritipn is undifined" );
            return "sorry :(. Pas de description disponible !";
        } else
        {
            console.log( "descritipn is difined" );
            return this.description;
        }
    }

    isLink ()
    {
        if ( this.link == null || this.link == undefined )
        {
            return false;
        } else
        {
            return true;
        }
    }

    creatPub ()
    {

        // div de la publicité globale ...
        const pub = doms[ 'creat' ]( 'div', [ 'hid-ob', 'ccb', 'w-100', 'display-m-900', 'box-pub' ] );
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

        const picture = doms[ 'creat' ]( 'img', [ 'bg-img-pub', 'bg-dyn' ] );
        doms[ 'attr' ]( picture, 'src', this.getImg() );
        doms[ 'attr' ]( picture, 'alt', 'logo' );
        doms[ 'attr' ]( picture, 'style', "width: 50px; height: 50px; border-radius: 50%; margin: 5px; background: {{ asset('build/images/web') }}${this.img}" );

        // const prgName = doms[ 'creat' ]( 'p', [ 'p' ], null );
        const prgName = doms[ 'creat' ]( 'p', [ 'p' ] );
        doms[ 'text' ]( prgName, this.getName() );

        const h1 = doms[ 'creat' ]( 'h1', [ 'line', 'big-title', 'w-100' ] );
        const h2 = doms[ 'creat' ]( 'h2', [ 'smoll-title' ] );
        const prg1 = doms[ 'creat' ]( 'p', [ 'p' ] );


        doms[ 'text' ]( h1, this.getTitle() );
        doms[ 'text' ]( h2, 'le sous titre de la boutique !' );
        doms[ 'text' ]( prg1, this.getDescription() );

        const contentLineProfile = [ picture, prgName ];
        const html = [ lineProfile, h1, h2, desc ];
        const descComposant = [ prg1, contentLInk ];

        // doms[ 'append' ]( pub, contentLIneProfile );
        doms[ 'append' ]( doms[ 'query' ]( 'pub-header', 'id' ), [ pub ] );
        if ( this.isLink() )
        {
            const link1 = doms[ 'creat' ]( 'a', [ 'btn', 'btn-secondary' ] );
            doms[ 'text' ]( link1, this.link );
            doms[ 'attr' ]( link1, 'href', this.link );
            doms[ 'append' ]( contentLInk, [ link1 ] );
        }
        doms[ 'append' ]( lineProfile, contentLineProfile );
        doms[ 'makes' ]( pub, html );
        doms[ 'makes' ]( desc, descComposant );

    }

};
