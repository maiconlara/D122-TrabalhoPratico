let modalKey = 0
let quantProdutos = 1
let cart = [] 

let subtotal = 0
let desconto = 0
let total    = 0
let quasetotal = 0;
let totp = 0;

const seleciona = (elemento) => document.querySelector(elemento)
const selecionaTodos = (elemento) => document.querySelectorAll(elemento)

const formatoReal = (valor) => {
    return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
}

const formatoMonetario = (valor) => {
    if(valor) {
        return valor.toFixed(2)
    }
}

const abrirModal = () => {
    seleciona('.produtoWindowArea').style.opacity = 0 
    seleciona('.produtoWindowArea').style.display = 'flex'
    setTimeout(() => seleciona('.produtoWindowArea').style.opacity = 1, 150)
}

const fecharModal = () => {
    seleciona('.produtoWindowArea').style.opacity = 0 
    setTimeout(() => seleciona('.produtoWindowArea').style.display = 'none', 500)
}

const botoesFechar = () => {
    // BOTOES FECHAR MODAL
    selecionaTodos('.produtoInfo--cancelButton, .produtoInfo--cancelMobileButton').forEach( (item) => item.addEventListener('click', fecharModal) )
}

const preencheDadosDasProdutos = (produtoItem, item, index) => {
   
	produtoItem.setAttribute('data-key', index)
    produtoItem.querySelector('.produto-item--img img').src = item.img
    produtoItem.querySelector('.produto-item--price').innerHTML = formatoReal(item.price[2])
    produtoItem.querySelector('.produto-item--name').innerHTML = item.name
    produtoItem.querySelector('.produto-item--desc').innerHTML = item.description
}

const preencheDadosModal = (item) => {
    seleciona('.produtoBig img').src = item.img
    seleciona('.produtoInfo h1').innerHTML = item.name
    seleciona('.produtoInfo--desc').innerHTML = item.description
    seleciona('.produtoInfo--actualPrice').innerHTML = formatoReal(item.price[2])
}


const pegarKey = (e) => {
    let key = e.target.closest('.produto-item').getAttribute('data-key')
    console.log('Produto clicad ' + key)
    console.log(produtoJson[key])

    quantProdutos = 1

    modalKey = key

    return key
}

const mudarQuantidade = () => {
    // Ações nos botões + e - da janela modal
    seleciona('.produtoInfo--qtmais').addEventListener('click', () => {
        quantProdutos++
        seleciona('.produtoInfo--qt').innerHTML = quantProdutos
    })

    seleciona('.produtoInfo--qtmenos').addEventListener('click', () => {
        if(quantProdutos > 1) {
            quantProdutos--
            seleciona('.produtoInfo--qt').innerHTML = quantProdutos	
        }
    })
}

const adicionarNoCarrinho = () => {
    seleciona('.produtoInfo--addButton').addEventListener('click', () => {
        console.log('Adicionar no carrinho')
    	console.log("Produto " + modalKey)
    	console.log("Quant. " + quantProdutos)

        let price = seleciona('.produtoInfo--actualPrice').innerHTML.replace('R$&nbsp;', '')
    
	    let identificador = produtoJson[modalKey].id

        let key = cart.findIndex( (item) => item.identificador == identificador )
        console.log(key)

        if(key > -1) {

            cart[key].qt += quantProdutos
        } else {
  
            let produto = {
                identificador,
                id: produtoJson[modalKey].id,
                qt: quantProdutos,
                price: parseFloat(price) 
            }
            quantProdutos = 1;
            seleciona('.produtoInfo--qt').innerHTML = quantProdutos
            cart.push(produto)
            console.log(produto)
            console.log('Sub total R$ ' + (produto.qt * produto.price).toFixed(2))
        }
        quantProdutos = 1;
        seleciona('.produtoInfo--qt').innerHTML = quantProdutos
        fecharModal()
        abrirCarrinho()
        atualizarCarrinho()
    })
}

const abrirCarrinho = () => {
    console.log('Qtd de itens no carrinho ' + cart.length)
    if(cart.length > 0) {
	    seleciona('aside').classList.add('show')
        seleciona('header').style.display = 'flex' 
    }

    seleciona('.menu-openner').addEventListener('click', () => {
        if(cart.length > 0) {
            seleciona('aside').classList.add('show')
            seleciona('aside').style.left = '0'
        }
    })
}

const fecharCarrinho = () => {
    seleciona('.menu-closer').addEventListener('click', () => {
        seleciona('aside').style.left = '100vw' 
        seleciona('header').style.display = 'flex'
    })
}

const atualizarCarrinho = () => {
	seleciona('.menu-openner span').innerHTML = cart.length
	if(cart.length > 0) {

		seleciona('aside').classList.add('show')

		seleciona('.cart').innerHTML = ''


		for(let i in cart) {

			let produtoItem = produtoJson.find( (item) => item.id == cart[i].id )
			console.log(produtoItem)

            totp = cart[i].price * cart[i].qt ;
            quasetotal += totp;
            subtotal = quasetotal;
          
			let cartItem = seleciona('.models .cart--item').cloneNode(true)
			seleciona('.cart').append(cartItem)

			let produtonName = `${produtoItem.name})`

			cartItem.querySelector('img').src = produtoItem.img
			cartItem.querySelector('.cart--item-nome').innerHTML = produtonName
			cartItem.querySelector('.cart--item--qt').innerHTML = cart[i].qt
  
			cartItem.querySelector('.cart--item-qtmais').addEventListener('click', () => {
                console.log('Clicou no botão mais')
				cart[i].qt++

				atualizarCarrinho()
			})

			cartItem.querySelector('.cart--item-qtmenos').addEventListener('click', () => {
				console.log('Clicou no botão menos')
				if(cart[i].qt > 1) {
					cart[i].qt--
				} else {

					cart.splice(i, 1)
				}

                (cart.length < 1) ? seleciona('header').style.display = 'flex' : ''


				atualizarCarrinho()
			})

			seleciona('.cart').append(cartItem)
		} 

		desconto = subtotal * 0
		total = subtotal - desconto
        seleciona('.subtotal span:last-child').innerHTML = formatoReal(subtotal)
		seleciona('.desconto span:last-child').innerHTML = formatoReal(desconto)
		seleciona('.total span:last-child').innerHTML    = formatoReal(total)
        quasetotal = 0;
	} else {

		seleciona('aside').classList.remove('show')
		seleciona('aside').style.left = '100vw'
	}


}


/*const finalizarCompra = () => {
    seleciona('.cart--finalizar').addEventListener('click', () => {
        console.log('Finalizar compra')
        seleciona('aside').classList.remove('show')
        seleciona('aside').style.left = '100vw'
        seleciona('header').style.display = 'flex'
    })
}*/


produtoJson.map((item, index ) => {

    let produtoItem = document.querySelector('.models .produto-item').cloneNode(true)

    seleciona('.produto-area').append(produtoItem)

    preencheDadosDasProdutos(produtoItem, item, index)
    
    produtoItem.querySelector('.produto-item a').addEventListener('click', (e) => {
        e.preventDefault()
        console.log('Clicou na produto')


        let chave = pegarKey(e)

        abrirModal()

        preencheDadosModal(item)


		seleciona('.produtoInfo--qt').innerHTML = quantProdutos



    })

    botoesFechar()

}) 


function mostrar() {
    var dropdown = document.getElementById('conta-options');
  
    if(dropdown.style.display == '' || dropdown.style.display == 'none'){
      dropdown.style.display = 'block';
    } else if(dropdown.style.display == 'block'){
      dropdown.style.display = 'none';
    }
  }
  

mudarQuantidade()

adicionarNoCarrinho()
atualizarCarrinho()
fecharCarrinho()
finalizarCompra()
