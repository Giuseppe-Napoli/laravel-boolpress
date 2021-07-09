
class FormatDate{
    static format(date){
        
        let d = new Date(date);
        let day = d.getDate();
        let m = d.getMonth() + 1;
        let y = d.getFullYear();
    
        if(day < 10) day = '0' + day;
        if(m < 10) m = '0' + m;
    
        return `${day}/${m}/${y}`;
    }
        
}

//se voglio importarla da qualche parte devo prima esportarla 

export default FormatDate;