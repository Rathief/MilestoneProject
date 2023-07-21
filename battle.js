const enemies = [
    { name: "skeleton", hp: 5, att: 1},
    { name: "demon", hp: 10, att: 3}
]
const levels = {
    easy: [1,1,2],
    hard: [2,2,2]
}
function battle(unit_data, levelName){
    let level = levels[levelName]
    for (let i = 0; i < level.length; i++) {
        let enemy = enemies[level[i]-1];
        let enemy_hp = enemy["hp"]
        while(unit_data["base_hp"]>0 && enemy_hp>0){
            unit_data["base_hp"] -= enemy["att"]
            enemy_hp -= unit_data["base_att"]
        }
        if(unit_data["base_hp"] <= 0){
            alert("Your "+unit_data["unit_name"]+" died!")
            return
        }
    }
    alert("Your "+unit_data["unit_name"]+" won!")
}