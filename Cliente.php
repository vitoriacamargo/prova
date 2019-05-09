<?php	
//github.com/rafaelflorindo/InformaticaIntegrado/
	
class Noticia{
	public $id, $name, $telefone, $celular, $endereco, $numero, $bairro, $cidade, $cep, $dataCadastro;
	public $dataCadastro, $situacao;
	/********************************************************/
	public function setTitulo($name){
		$this->nome = $name;
	}
	public function settelefone($telefone){
		$this->telefone = $telefone;
	}
	public function setcelular($celular){
		$this->celular = $celular;
	}
	public function setCurso($curso){
		$this->curso = $curso;
	}
	public function setId($id){
		$this->id = $id;	
	}
	public function setSituacao($situacao){
	}
		$this->situacao = $situacao;	
		public function setdataCadastro($dataCadastro){
		$this->dataCadastro = $dataCadastro;
	
	/********************************************************/
	public function getTitulo(){
		return $this->titulo;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function getAutor(){
		return $this->autor;
	}
	public function getDataPublicacao(){
		return $this->dataPublicacao;
	}
	public function getCurso(){
		return $this->curso;
	}
	public function getId(){
		return $this->id;
	}
	public function getSituacao(){
		return $this->situacao;
	}
	/********************************************************/
	public function cadastrar($dados){
		//$dados=array($titulo, $descricao, $autor, $dataPublicacao, $curso)
		list($titulo, $descricao, $autor, $dataPublicacao, $curso) = $dados;
		
		$this->setTitulo($titulo);
		$this->setDescricao($descricao);
		$this->setAutor($autor);
		$this->setDataPublicacao($dataPublicacao);
		$this->setCurso($curso);
		
		$conectar = new mysqli("localhost","root","","noticialisboa");
		$sql = "insert into noticia 
					(titulo, descricao, autor, dataPublicacao, curso)
					values (
					'{$this->getTitulo()}', 
					'{$this->getDescricao()}',
					'{$this->getAutor()}', 
					'{$this->getDataPublicacao()}',
					'{$this->getCurso()}'
					)		
		";		
		$gravar = $conectar->query($sql);
		$num = $conectar->affected_rows;
		if($num==1) {
			echo "<fieldset>";
			echo "<h2>Os dados abaixo foram armazenados na classe com sucesso!!!</h2>";
			echo "<br>Título: ". $this->getTitulo();
			echo "<br>Descrição: ". $this->getDescricao();
			echo "<br>Autor: ". $this->getAutor();	
			echo "<br>Publicado em: ". $this->getDataPublicacao();
			echo "<br>Curso: ". $this->getCurso();
			echo "</fieldset>";
		}else {
			echo "<fieldset>";
			echo "Erro ao gravar os dados";	
			echo "</fieldset>";
		}
	}
	public function alterar($dados){}
	
	public function ativarInativar($id,$situacao){
		$this->setId($id);
		$this->setSituacao($situacao);
		
		echo $sql = "update noticia set
					ativo=" . $this->getSituacao() . " where id= " . $this->getId();		
					
		$conectar = new mysqli("localhost","root","","lojaVit");
		$executar = $conectar->query($sql);
		$num = $conectar ->affected_rows;
		if($num==1) {
			return 1;
			}else{
				return 0;
			}
			
	}
	public function buscarUm($id){}//fecha método buscarUm
	public function buscarTodos(){
		$sql = "select * from noticia ORDER by titulo desc ";
		$conectar = new mysqli("localhost","root","","lojaVit");
		$listar = $conectar->query($sql);
		$noticias = array();
		while($linha = $listar->fetch_array()) {
			$noticias[] = $linha;
		}
		return $noticias;
	}//fecha método buscarTodos
}//fecha classe
?>


