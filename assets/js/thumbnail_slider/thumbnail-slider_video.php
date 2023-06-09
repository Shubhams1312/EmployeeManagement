<style>
<?php 
//while($no_of_slider <= $total_slider ){
	?>

 

#thumbnail-slider<?php echo $no_of_slider;?> {
    margin:0 auto; /*center-aligned*/
    width:100%;/*width:400px;*/
    max-width:700px;
    padding:4px 34px;/*Gives room for arrow buttons*/
    box-sizing:border-box;
    position:relative;
    -webkit-user-select: none;
    user-select:none;
}

#thumbnail-slider<?php echo $no_of_slider;?> div.inner {
    border-radius:3px;
    /*border:4px solid transparent;
    box-shadow:0 0 4px rgba(0,0,0,0.4);*/
    /*the followings should not be changed */
    position:relative;
    overflow:hidden;
    padding:0;
    margin:0;
}

 
#thumbnail-slider<?php echo $no_of_slider;?> div.inner ul {
    
    /*the followings should not be changed */
    white-space:nowrap;
    position:relative;
    left:0; top:0;
    list-style:none;
    font-size:0;
    padding:0;
    margin:0;
    float:left!important;
    width:auto!important;
    height:auto!important;
}

#thumbnail-slider<?php echo $no_of_slider;?> ul li {
    opacity:1;
    display:inline-block;
    *display:inline!important; /*IE7 hack*/
    border:2px solid transparent;

    margin:0 3px; /* Spacing between thumbs*/
    transition:border-color 0.5s;
    box-sizing:content-box;
    
    text-align:center;
    vertical-align:middle;
    padding:0;
    position:relative;
    list-style:none;
    backface-visibility:hidden;
}

#thumbnail-slider<?php echo $no_of_slider;?> ul li.active {
    border-color:white;
}

#thumbnail-slider<?php echo $no_of_slider;?> .thumb {
    width:100%;
    height: 100%;
    background-size:contain;
    background-repeat:no-repeat;
    background-position:center center;
    display:block;
    position:absolute;
    font-size:0;
}
#thumbnail-slider<?php echo $no_of_slider;?> .thumb  h4 {
    font-size:0;
}

/* --------- navigation controls ------- */
/* The nav id should be: slider id + ("-prev", "-next", and "-pause-play") */

#thumbnail-slider<?php echo $no_of_slider;?>-pause-play {display:none;} /*.pause*/

#thumbnail-slider<?php echo $no_of_slider;?>-prev, #thumbnail-slider<?php echo $no_of_slider;?>-next
{
    opacity:1;
    position: absolute;
    /*background-color:#0346a3;*/
    *background-color:#ccc;/*IE7 hack*/
    backface-visibility:hidden;
    width:32px;
    height:60px;
    line-height:60px;
    top: 50%;
    margin:0;
    margin-top:-30px;
    color:white;    
    z-index:10;
    cursor:pointer;
}

#thumbnail-slider<?php echo $no_of_slider;?>-prev {
    left:1px; right:auto;
}

#thumbnail-slider<?php echo $no_of_slider;?>-next {
    left:auto; right:1px;
}
#thumbnail-slider<?php echo $no_of_slider;?>-next.disabled, #thumbnail-slider<?php echo $no_of_slider;?>-prev.disabled {
    opacity:0.3;
    cursor:default;
}


/* arrows */
#thumbnail-slider<?php echo $no_of_slider;?>-prev::before, #thumbnail-slider<?php echo $no_of_slider;?>-next::before {
    position: absolute;
    top: 24px;
    content: "";
    display: block;
    width: 12px;
    height: 12px;
    border-left: 6px solid #DDD;
    border-top: 6px solid #DDD;
}

#thumbnail-slider<?php echo $no_of_slider;?>-prev::before {
    left:7px;
    -ms-transform:rotate(-45deg);/*IE9*/
    -webkit-transform:rotate(-45deg);
    transform: rotate(-45deg);
}

#thumbnail-slider<?php echo $no_of_slider;?>-next::before {
    right:7px;
    -ms-transform:rotate(135deg);/*IE9*/
    -webkit-transform:rotate(135deg);
    transform: rotate(135deg);
}

@media only screen and (max-width:736px){
    
    #thumbnail-slider<?php echo $no_of_slider;?> {
        padding:4px 24px;
    }
}


<?php 
	/* $no_of_slider++;
	} */
?>
</style>