var config = {
  message: {
      kill: 'Katana through the heart!'
  }
}
katana = function(){
  throw new Error(config.message.kill);
}
