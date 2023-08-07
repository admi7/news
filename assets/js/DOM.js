const DOMS = {
    "envoyerRequete": document.getElementById( 'envoyerRequete' )
};



const doms = {
    "query": ( name, type = null ) =>
    {
        if ( type === 'all' )
        {
            return document.querySelectorAll( name );
        }
        else if ( type === 'id' )
        {
            return document.getElementById( name );
        }
        return document.querySelector( name );
    },
    "creat": ( el, classes = null, id = null ) =>
    {
        const obj = document.createElement( el );
        if ( classes !== null )
        {
            for ( const classe of classes )
            {
                obj.classList.add( classe );
            }
        }
        if ( id !== null )
        {
            obj.id = id;
        }
        return obj;
    },
    "append": ( el, objet ) =>
    {
        // console.log( el );
        if ( el )
        {
            for ( const element of objet )
            {
                el.appendChild( element );
            }
        } else
        {
            console.log( "this element doesn't exist !" );
        }
        return el;
    },
    "makes": ( el, html ) =>
    {
        if ( el )
        {
            for ( const element of html )
            {
                el.appendChild( element );
            }
        } else
        {
            console.log( "this element doesn't exist !" );
        }
        return el;
    },
    "text": ( el, text ) =>
    {
        return el.innerText = text;
    },
    "attr": ( el, attr, value ) =>
    {
        el.setAttribute( attr, value );
        // console.log( el );
    }
};

// console.log( doms[ 'func' ]( '#testId' ) );

export { doms, DOMS };
