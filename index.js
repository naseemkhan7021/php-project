
function showContent(atributes,i) {
    var moreContent = document.getElementById(`${atributes}-${i}`);
    moreContent.style.display = 'block';
};

// show the comment content 
var contant = document.getElementsByClassName('readmore');
Array.from(contant).forEach((element,i)=>{
    element.addEventListener('click',(e)=>{
        // now locate the parant element 
        const rmPerant = e.target.parentNode
        showContent('moreW',i);
        rmPerant.innerHTML = '';
        
    });
});


// show the replay input areay
var replay = document.getElementsByClassName('replaybtn');
Array.from(replay).forEach((element,i)=>{
    // console.log();
    element.addEventListener('click',()=>{
        showContent('replayinput',i);
    });
});




// console.log();