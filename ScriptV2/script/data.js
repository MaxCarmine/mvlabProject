

const url="http://localhost:8086/query?u=admin&p=1234&q=SHOW DATABASES";
let obj;
var requestOptions = {
    method: 'POST',
    redirect: 'follow'
    };
    
fetch(url,requestOptions)
.then(response => response.json())
.then (result=>{
    obj=result
    obj.results.map((current,idx)=>{
                        current.series.map((curr,idx)=>{
                            curr.values.map((c,idx)=>{
                                var select1 = document.getElementById("dbs")
                                for(idx in c) {
                                    select1.options[select1.options.length] = new Option(c,c);
                                }
                                var select2 = document.getElementById("dbd")
                                for(idx in c) {
                                    select2.options[select2.options.length] = new Option(c,c);
                                }
                            })
                        })
                    })
                })
.catch(error => console.log('error', error));






function load(){
    var x = document.getElementById("pageloader");
    x.style.display = "block";

}





count=0;
function  tabeleSelector(id,source){

    if(count!=0){
        var select = document.getElementById(id);
        var length = select.options.length;
        for (i = length-1; i >= 0; i--) {
            select.options[i] = null;
        }
    }
    var x = document.getElementById(source).value;
    let obj;
    var requestOptions = {
    method: 'POST',
    redirect: 'follow'
    };

    fetch("http://localhost:8086/query?u=admin&p=1234&q=SHOW MEASUREMENTS ON "+x, requestOptions)
    .then(response => response.json())
    .then (result=>{
    obj=result
    obj.results.map((current,idx)=>{
                        current.series.map((curr,idx)=>{
                            curr.values.map((c,idx)=>{
                                
                                var select = document.getElementById(id)
                                for(idx in c) {
                                    select.options[select.options.length] = new Option(c,c);
                                }
                                
                                count++;
                            })
                        })
                    })
                })
                
    .catch(error => console.log('error', error));
};




function showDbDest(that){
    if(that.value == "toDb"){
        var x = document.getElementById("databaseDest");
        x.style.display = "block";
    }
    if(that.value == "toFile"){
        var x = document.getElementById("databaseDest");
        x.style.display = "none";
    }
    if(that.value == "toScreen"){
        var x = document.getElementById("databaseDest");
        x.style.display = "none";
    }
}






function check(that){
    
    if(that.value == "gen") {
        var x = document.getElementById("form");
        x.style.display = "block";

        var y = document.getElementById("file");
        y.style.display = "none";
        
        var z = document.getElementById("databaseSource");
        z.style.display = "none";
        
        
        
    } 
    if(that.value == "file"){ 
        var x = document.getElementById("file");
          x.style.display = "block";
          
        var y = document.getElementById("form");
        y.style.display = "none";
        
        var z = document.getElementById("databaseSource");
        z.style.display = "none";
        
        
        

    }
    if(that.value == "db"){
        var x = document.getElementById("databaseSource");
        x.style.display = "block";
      
        var y = document.getElementById("file");
        y.style.display = "none";
        
        var z = document.getElementById("form");
        z.style.display = "none";
    }

    
}

i=0

function change(){
  
  namee = "Random."+i++
  document.getElementById("namee").setAttribute('value',namee);
  sdate=randomDate(new Date(2021, 0, 1), new Date(2031,0,1));
  document.getElementById("sdate").setAttribute('value',sdate);
  edate=randomDate(new Date(sdate), new Date(2031,0,1));
  document.getElementById("edate").setAttribute('value',edate);
  avrage=generateConsumption();
  document.getElementById("avrage").setAttribute('value',avrage);
  variation=generteVariation();
  document.getElementById("variation").setAttribute('value',variation);
  unit=generateUnit();
  document.getElementById("unit").setAttribute('value',unit);

}





function  generateUnit(){
  let unitsM=['daW','hW','kW','MW','GW','TW','PW','EW','ZW','YW','ml','cl','dl','l','dal','hl'];
  let random=Math.floor((Math.random() * (unitsM.length - 0 + 1)) + 0);
  let unit=unitsM[random];
  return unit;
}



function randomDate(start, end) {
    var d = new Date(start.getTime() + Math.random() * (end.getTime() -  start.getTime())),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}



function generateConsumption(){
    let minCons=1000;
    let maxCons=10000;
    let cons=Math.floor((Math.random() * (maxCons - minCons + 1)) + minCons);
    return cons;
}

function generteVariation() {
    let minVar=100;
    let maxVar=500
    let variation=Math.floor((Math.random() * (maxVar - minVar + 1)) + minVar);
    return variation;
}





