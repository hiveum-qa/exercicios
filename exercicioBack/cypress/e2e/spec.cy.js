describe('Testando o cadastros filmes e series', () => {

  beforeEach(() => {
    cy.visit('/home') 
  })

  it('cadastrando filme e verificando se existe', () => {
    cy.get('.adicionaFilmes').click()
    cy.get('[name="nome"]').type("Filme Teste")
    cy.get('[name="ano"]').select("2025")
    cy.get('[name="genero"]').select("comedia")
    cy.get('[name="personagem"]').type("Teste personagem")
    cy.get('.button').click()
    cy.get('[href="/series"]').click()
    cy.get('.adicionaSerie').click()
    cy.get('[name="ano"]').select("2024")
    cy.get('[name="genero"]').select("comedia")
    cy.get('[name="personagem"]').type("tom")
    cy.get('[name="temporada"]').type(5)
    cy.get('[name="nome"]').type("serie Teste")
    cy.get('.button').click()
    cy.get('[href="/home"]').click()

  })

    it('cadastrando serie e verificando se existe', () => {
    cy.get('[href="/series"]').click()
    cy.get('.adicionaSerie').click()
    cy.get('[name="ano"]').select("2024")
    cy.get('[name="genero"]').select("comedia")
    cy.get('[name="personagem"]').type("tom")
    cy.get('[name="temporada"]').type(5)
    cy.get('[name="nome"]').type("serie Teste")
    cy.get('.button').click()
    cy.get('[href="/series"]').click()
  })
})

describe('validando campos vazios', () => {
   beforeEach(() => {
    cy.visit('/adicionarFilme') 
  })

  it('não permite campos vazios, validação com html required', () => {
    cy.get('.button').click()
    cy.get('[name="nome"]').should('have.attr', 'required')
    cy.get('[name="personagem"]').should('have.attr', 'required')
  })

   it('verificando se o formulario foi enviado ', () => {
    cy.get('.button').click()
    cy.url().should('include', '/adicionarFilme')

  })
})
describe('Testando se a pagina de filmes existe', () => {
  it('verificando pagina de filmes', () => {
    cy.visit('/home')
     cy.contains('Filmes').should('be.visible')

  })
})



  


