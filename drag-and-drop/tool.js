class Tool{
    constructor(){
        this.list = {};
    }

    set_item_to_int(key){
        this.list[key] = {'type': 'int', 'value': 0};
    }

    set_item_to_rand(key, rangeFROM, rangeTO){
        this.list[key] = {'type': 'rand', 'range': [rangeFROM, rangeTO]};
    }

    set_item_to_gibberish(key, length){
        this.list[key] = {'type': 'gibberish', 'length': length, 'value-list': []};
    }

    get_item(key){

        // if(!this.list.has(key)){
        //     console.log('key not set');
        //     return;
        // }
        if(!(key in this.list)){
            console.log('key not set');
            return;
        }

        const info = this.list[key];

        if(info['type'] == 'int'){
            return info["value"] ++;
        }
        else if(info['type'] == 'rand'){
            return Math.random() * (info['range'][1] - info['range'][0]+1) + info['range'][0];
        }
        else if(info['type'] == 'gibberish'){
            var text = '';
            const uppercase = "abcdefghijklmnopqrstuvwxyz".toUpperCase();
            const lowercase = "abcdefghijklmnopqrstuvwxyz";
            const num = "0123456789";

            while( text.length==0 || info['value-list'].includes(text)){
                for(var i = 0 ; i < info['length'] ; i++){
                    if(Math.random() < 0.3){
                        var j = Math.random() * 26;
                        text += uppercase.charAt(j);
                    }
                    else if(Math.random() < 0.6){
                        var j = Math.random() * 26;
                        text += lowercase.charAt(j);
                    }
                    else{
                        var j = Math.random() * 10;
                        text += num.charAt(j);
                    }
                }
            }

            this.list[key]['value-list'].push(text);
            return text;
            
        }





    }
}