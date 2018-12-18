get_newmsg(){
    this.$nextTick( function () {
        this.$store.commit('get_newmsg',{id: this.curr_room.id, offset: this.curr_room.messages.length});
        this.request_flg= 0;
    });
},