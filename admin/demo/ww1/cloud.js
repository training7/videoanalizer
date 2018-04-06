var cloudDrawn = false;

function createWordCloud(){

  //checks if cloud is already drawn and removes it if it is
  if(cloudDrawn)d3.select('svg').remove();

  //get text from the form text area
  var plainText = document.getElementById('text').value.toLowerCase();

  // converts plain text into an array of words
  rawWords = plainText.match(/[^\.",\s\-\—“”]+/g);


  var filteredWords = [];

  //populate a new array with objects containing all the words and the number of times they appear in the text
  rawWords.forEach(function(word){
    var wordFounded = false;
     
    filteredWords.forEach(function(element){
      if(element['word'] === word){
        wordFounded = true;
        return element['count']++;
       } 
    });

    if((!wordFounded || filteredWords.length <= 0) && word.length > 3) return filteredWords.push({'word': word, 'count': 1});
  }); 

  //debugging
  console.log(rawWords);
  console.log(filteredWords);

  var fill = d3.scale.category20();


  var width = 750,
      height = 500;

  //sets cloud settings
  d3.layout.cloud()
      .size([width, height])
      .words(filteredWords.map(function(d) {
        return {text: d['word'], size: 10 + d['count'] * 10, test: "haha"};
      }))
      .padding(0)
      //.rotate(function() { return ~~(Math.random() * 2) * 90; })
      .font("Impact")
      .fontSize(function(d) { return d.size; })
      .on("end", draw)
      .start();

  //draws the cloud
  function draw(words) {

    cloudDrawn = true;

    d3.select(".word-cloud").append("svg")
        .attr("width", width)
        .attr("height", height)
      .append("g")
        .attr("transform", "translate(" + width/2 + "," + height/2 + ")")
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { return d.size + "px"; })
        .style("font-family", "Impact")
        .style("fill", function(d, i) { return fill(i); })
        .attr("text-anchor", "middle")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(
 { return d.text; });
  }

}
