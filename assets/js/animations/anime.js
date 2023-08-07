
const dataJson = require( "../../JSON/pubs/clients.json" );
const Pub = require( "../class/Pub" );

// console.log( dataJson );
var data = { ...dataJson };
// console.log( data[ 0 ] );
for ( let i = 0; i < data.length; i++ )
{
    console.log( data[ i ] );
}

function allAnimations ()
{
    // console.log( desc );
    var res = {};
    const pubs = {
        "boxPub": new Pub( 'Aliou Sow', '774095278', 'Pikine - Icotaf', 'Entreprise de publicité' ),
        "boxPub1": new Pub( 'Moustapha Sow', '773610681', 'Pikine - Icotaf', 'Pharmacie à Keur Massar', "{{ asset('build/images/icons/icon/phone.gif')}}", "This is a description of pub ... bla bla bla!", 'link' ),
    };

    res[ 'pubs' ] = pubs;
    return res;

};

export { allAnimations };
