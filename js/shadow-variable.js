// Fonction donnée

const articleList = []; // In a real app this list would be full of articles.
var kudos = 5;

function calculateTotalKudos(articles) {
  var kudos = 0;

  for (let article of articles) {
    kudos += article.kudos;
  }

  return kudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(
    articleList
  )}</p>
`);

// Fonction refactorisée

const articleList = []; // In a real app this list would be full of articles.
var kudos = 5; // We had 2 variables kudos, to avoid confusion we only kept the 'global' one

// Instead of doing a for loop for this array, we can also use the .reduce function
// total starts with the value 0 and gets each acticle kudos from the articleList
const totalKudos = articleList.reduce(
  (total, article) => total + article.kudos,
  0
);

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${totalKudos}</p>
`);
