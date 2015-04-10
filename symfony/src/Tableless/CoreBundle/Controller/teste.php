/**
* @param FormBuilderInterface $builder
* @param array $options
*/
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
->add('title')
->add('content')
->add('file')
->add('author')
;
}