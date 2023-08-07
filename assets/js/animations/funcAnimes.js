import { doms } from '../DOM';

// VARIABLES
const btnL = doms[ 'query' ]( '.btnSliderLeft' );
const btnR = doms[ 'query' ]( '.btnSliderRight' );

const articles = doms[ 'query' ]( '.slideBarArticles .slideArticle', 'all' );
const btnsSlide = doms[ 'query' ]( '.btnSlide', 'all' );
const nArticles = articles.length;

// console.log( btnsSlide );



// queryIOTN FOR ON CLICK IN BUTTON LEFT OR RIGHT



// FUNCTION FOR SLIDING THE SLIDER BAR

function sliding ()
{
    console.log( 'sliding' );
}



function slidersAnimes ( article )
{
    console.log( 'sliders running...' );
    if ( article )
    {
        if ( btnL && btnR )
        {
            btnsSlide.forEach( btnSlide =>
            {
                btnSlide.addEventListener( 'click', () =>
                {
                    sliding();
                } );
            } );
        } else
        {
            console.log( 'verifier la class des buttons (btnSliderLeft/btnSliderRight)' );
        }
    }

};

export { slidersAnimes };
