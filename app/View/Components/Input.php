<?php
    namespace App\View\Components;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class Input extends Component {
        public string $name;
        public string $label;
        public string $type;
        public mixed $value;
        public string $placeholder;
        public string $class;
        public string $step;

        //Váriavel $class já vem com 'form-control', mas pode ter outras características
        //Váriável $step, pra quando o input for número decimal   
        public function __construct($name, $label, $class, $type = 'text', $value=NULL, $placeholder='', $step="NULL") {
            $this->name = $name;
            $this->label = $label;
            $this->class = $class;
            $this->value = $value;
            $this->placeholder = $placeholder;
            $this->type = $type;
            $this->step = $step;
        }

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string {
            return view('components.input');
        }
    }
?>
