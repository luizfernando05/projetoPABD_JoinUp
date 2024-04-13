use joinup

db.administrador.insertMany([
  { usuarioAdm: "Adm1", senhaAdm: "senha1" },
  { usuarioAdm: "Adm2", senhaAdm: "senha2" }
])

db.administrador.find().pretty()