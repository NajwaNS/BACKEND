// MongoDB Playground
// Use Ctrl+Space inside a snippet or a string literal to trigger completions.

// The current database to use.
use("belajar");

db.customers.insertOne({
  _id: "edoriansyah",
  name: "Edo Riansyah",
});

db.products.insertMany([
  {
    _id: 1,
    name: "Indomie ayam",
    price: new NumberLong("2000"),
  },
  {
    _id: 2,
    name: "Mie sedap goreng",
    price: new NumberLong("2000"),
  },
]);

db.orders.insertOne({
  _id: new ObjectId(),
  total: new NumberLong("8000"),
  items: [
    {
      product_id: 1,
      price: new NumberLong("2000"),
      quantity: new NumberInt("2"),
    },
    {
      product_id: 2,
      price: new NumberLong("2000"),
      quantity: new NumberInt("2"),
    },
  ],
});

db.customers.find({ _id: "edoriansyah" });

db.orders.find({ "items.product_id": 1 });

db.products.find({
  price: {
    $gt: 1000,
  },
});
