<?php

/*
   Interface: iMomentsQodefLayoutNode
   A interface that implements Layout Node methods
*/

interface iMomentsQodefLayoutNode {
	public function hasChidren();

	public function getChild( $key );

	public function addChild( $key, $value );
}

/*
   Interface: iMomentsQodefRender
   A interface that implements Render methods
*/

interface iMomentsQodefRender {
	public function render( $factory );
}

/*
   Class: MomentsQodefPanel
   A class that initializes Qode Panel
*/

class MomentsQodefPanel implements iMomentsQodefLayoutNode, iMomentsQodefRender {

	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct( $title_label = "", $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->title           = $title_label;
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}

	public function hasChidren() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}

	public function getChild( $key ) {
		return $this->children[ $key ];
	}

	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( moments_qodef_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( moments_qodef_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}

				}
			}
		}
		?>
        <div class="qodef-page-form-section-holder" id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
            <h3 class="qodef-page-section-title"><?php echo esc_html( $this->title ); ?></h3>
			<?php
			foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			}
			?>
        </div>
		<?php
	}

	public function renderChild( iMomentsQodefRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: MomentsQodefContainer
   A class that initializes Qode Container
*/

class MomentsQodefContainer implements iMomentsQodefLayoutNode, iMomentsQodefRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct( $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}

	public function hasChidren() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}

	public function getChild( $key ) {
		return $this->children[ $key ];
	}

	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( moments_qodef_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( moments_qodef_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}

				}
			}
		}
		?>
        <div class="qodef-page-form-container-holder" id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			}
			?>
        </div>
		<?php
	}

	public function renderChild( iMomentsQodefRender $child, $factory ) {
		$child->render( $factory );
	}
}


/*
   Class: MomentsQodefContainerNoStyle
   A class that initializes Qode Container without css classes
*/

class MomentsQodefContainerNoStyle implements iMomentsQodefLayoutNode, iMomentsQodefRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct( $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}

	public function hasChidren() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}

	public function getChild( $key ) {
		return $this->children[ $key ];
	}

	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( moments_qodef_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( moments_qodef_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}

				}
			}
		}
		?>
        <div id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			}
			?>
        </div>
		<?php
	}

	public function renderChild( iMomentsQodefRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: MomentsQodefGroup
   A class that initializes Qode Group
*/

class MomentsQodefGroup implements iMomentsQodefLayoutNode, iMomentsQodefRender {

	public $children;
	public $title;
	public $description;

	function __construct( $title_label = "", $description = "" ) {
		$this->children    = array();
		$this->title       = $title_label;
		$this->description = $description;
	}

	public function hasChidren() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}

	public function getChild( $key ) {
		return $this->children[ $key ];
	}

	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}

	public function render( $factory ) {
		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $this->title ); ?></h4>

                <p><?php echo esc_html( $this->description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
					<?php
					foreach ( $this->children as $child ) {
						$this->renderChild( $child, $factory );
					}
					?>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php
	}

	public function renderChild( iMomentsQodefRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: MomentsQodefNotice
   A class that initializes Qode Notice
*/

class MomentsQodefNotice implements iMomentsQodefRender {

	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct( $title_label = "", $description = "", $notice = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->title           = $title_label;
		$this->description     = $description;
		$this->notice          = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( moments_qodef_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( moments_qodef_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}

				}
			}
		}
		?>

        <div class="qodef-page-form-section"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $this->title ); ?></h4>

                <p><?php echo esc_html( $this->description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="alert alert-warning">
						<?php echo esc_html( $this->notice ); ?>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php
	}
}

/*
   Class: MomentsQodefRow
   A class that initializes Qode Row
*/

class MomentsQodefRow implements iMomentsQodefLayoutNode, iMomentsQodefRender {

	public $children;
	public $next;

	function __construct( $next = false ) {
		$this->children = array();
		$this->next     = $next;
	}

	public function hasChidren() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}

	public function getChild( $key ) {
		return $this->children[ $key ];
	}

	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}

	public function render( $factory ) {
		?>
        <div class="row<?php if ( $this->next ) {
			echo " next-row";
		} ?>">
			<?php
			foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			}
			?>
        </div>
		<?php
	}

	public function renderChild( iMomentsQodefRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: MomentsQodefTitle
   A class that initializes Qode Title
*/

class MomentsQodefTitle implements iMomentsQodefRender {
	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();

	function __construct( $name = "", $title_label = "", $hidden_property = "", $hidden_value = "" ) {
		$this->title           = $title_label;
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( moments_qodef_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			}
		}
		?>
        <h5 class="qodef-page-section-subtitle" id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>><?php echo esc_html( $this->title ); ?></h5>
		<?php
	}
}

/*
   Class: MomentsQodefField
   A class that initializes Qode Field
*/

class MomentsQodefField implements iMomentsQodefRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct( $type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array() ) {
		global $moments_qodef_Framework;
		$this->type            = $type;
		$this->name            = $name;
		$this->default_value   = $default_value;
		$this->label           = $label;
		$this->description     = $description;
		$this->options         = $options;
		$this->args            = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values   = $hidden_values;
		$moments_qodef_Framework->qodeOptions->addOption( $this->name, $this->default_value, $type );
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			foreach ( $this->hidden_values as $value ) {
				if ( moments_qodef_option_get_value( $this->hidden_property ) == $value ) {
					$hidden = true;
				}

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: MomentsQodefMetaField
   A class that initializes Qode Meta Field
*/

class MomentsQodefMetaField implements iMomentsQodefRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct( $type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array() ) {
		global $moments_qodef_Framework;
		$this->type            = $type;
		$this->name            = $name;
		$this->default_value   = $default_value;
		$this->label           = $label;
		$this->description     = $description;
		$this->options         = $options;
		$this->args            = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values   = $hidden_values;
		$moments_qodef_Framework->qodeMetaBoxes->addOption( $this->name, $this->default_value );
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			foreach ( $this->hidden_values as $value ) {
				if ( moments_qodef_option_get_value( $this->hidden_property ) == $value ) {
					$hidden = true;
				}

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class MomentsQodefFieldType {

	abstract public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false );

}

class MomentsQodefFieldText extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$col_width = 12;
		if ( isset( $args["col_width"] ) ) {
			$col_width = $args["col_width"];
		}

		$suffix = ! empty( $args['suffix'] ) ? $args['suffix'] : false;

		$class = '';

		if ( ! empty( $repeat ) ) {
			$id    = $name . '-' . $repeat['index'];
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id    = $name;
			$value = moments_qodef_option_get_value( $name );
		}

		?>

        <div class="qodef-page-form-section <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $id ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr( $col_width ); ?>">
							<?php if ( $suffix ) : ?>
                            <div class="input-group">
								<?php endif; ?>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( htmlspecialchars( $value ) ); ?>"
                                />
								<?php if ( $suffix ) : ?>
                                    <div class="input-group-addon"><?php echo esc_html( $args['suffix'] ); ?></div>
								<?php endif; ?>
								<?php if ( $suffix ) : ?>
                            </div>
						<?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldTextSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$suffix = ! empty( $args['suffix'] ) ? $args['suffix'] : false;
		$class  = '';

		if ( ! empty( $repeat ) ) {
			$id    = str_replace( array( '[', ']' ), '', $name ) . '-' . rand();
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id    = $name;
			$value = moments_qodef_option_get_value( $name );
		}

		?>


        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $id ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<?php if ( $suffix ) : ?>
            <div class="input-group">
				<?php endif; ?>
                <input type="text"
                        class="form-control qodef-input qodef-form-element"
                        name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( htmlspecialchars( $value ) ); ?>"
                />
				<?php if ( $suffix ) : ?>
                    <div class="input-group-addon"><?php echo esc_html( $args['suffix'] ); ?></div>
				<?php endif; ?>
				<?php if ( $suffix ) : ?>
            </div>
		<?php endif; ?>
        </div>
		<?php

	}

}

class MomentsQodefFieldTextArea extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = moments_qodef_option_get_value( $name );
		}

		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr( $class ); ?>">
							<textarea class="form-control qodef-form-element"
                                    name="<?php echo esc_attr( $name ); ?>"
                                    rows="5"><?php echo esc_html( htmlspecialchars( $value ) ); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldTextAreaHtml extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = moments_qodef_option_get_value( $name );
		}

		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr( $class ); ?>">
							<?php wp_editor( $value, esc_attr( $name ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldTextAreaSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = moments_qodef_option_get_value( $name );
		}

		?>

        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>">
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <textarea class="form-control qodef-form-element"
                    name="<?php echo esc_attr( $name ); ?>"
                    rows="5"><?php echo esc_html( $value ); ?></textarea>
        </div>
		<?php

	}

}

class MomentsQodefFieldColor extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$id    = $name . '-' . $repeat['index'];
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id    = $name;
			$value = moments_qodef_option_get_value( $name );
		}

		?>

        <div class="qodef-page-form-section <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $id ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="my-color-field"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldColorSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$id    = $name . '-' . $repeat['index'];
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id    = $name;
			$value = moments_qodef_option_get_value( $name );
		}

		?>

        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $id ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <input type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="my-color-field"/>
        </div>
		<?php

	}

}

class MomentsQodefFieldImage extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$name      .= '[]';
			$value     = $repeat['value'];
			$class     = 'qodef-repeater-field';
			$has_value = empty( $value ) ? false : true;
		} else {
			$value     = moments_qodef_option_get_value( $name );
			$has_value = moments_qodef_option_has_value( $name );
		}

		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr( $class ); ?>">
                            <div class="qodef-media-uploader">
                                <div<?php if ( ! $has_value ) { ?> style="display: none"<?php } ?>
                                        class="qodef-media-image-holder">
                                    <img src="<?php if ( $has_value ) {
										echo esc_url( moments_qodef_get_attachment_thumb_url( $value ) );
									} ?>"
                                            class="qodef-media-image img-thumbnail"/>
                                </div>
                                <div style="display: none"
                                        class="qodef-media-meta-fields">
                                    <input type="hidden" class="qodef-media-upload-url"
                                            name="<?php echo esc_attr( $name ); ?>"
                                            value="<?php echo esc_attr( $value ); ?>"/>
                                </div>
                                <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                        href="javascript:void(0)"
                                        data-frame-title="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"
                                        data-frame-button-text="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                <a style="display: none;" href="javascript: void(0)"
                                        class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldImageSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			$id        = $name . '-' . $repeat['index'];
			$name      .= '[]';
			$value     = $repeat['value'];
			$class     = 'qodef-repeater-field';
			$has_value = empty( $value ) ? false : true;
		} else {
			$id        = $name;
			$value     = moments_qodef_option_get_value( $name );
			$has_value = moments_qodef_option_has_value( $name );
		}

		?>


        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $id ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <div class="qodef-media-uploader">
                <div<?php if ( ! $has_value ) { ?> style="display: none"<?php } ?>
                        class="qodef-media-image-holder">
                    <img src="<?php if ( $has_value ) {
						echo esc_url( moments_qodef_get_attachment_thumb_url( $value ) );
					} ?>"
                            class="qodef-media-image img-thumbnail"/>
                </div>
                <div style="display: none"
                        class="qodef-media-meta-fields">
                    <input type="hidden" class="qodef-media-upload-url"
                            name="<?php echo esc_attr( $name ); ?>"
                            value="<?php echo esc_attr( $value ); ?>"/>
                </div>
                <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                        href="javascript:void(0)"
                        data-frame-title="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"
                        data-frame-button-text="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                <a style="display: none;" href="javascript: void(0)"
                        class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
            </div>
        </div>
		<?php

	}

}

class MomentsQodefFieldFont extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_fonts_array;

		$class = '';

		if ( ! empty( $repeat ) ) {
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = moments_qodef_option_get_value( $name );
		}
		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>">
                            <select class="form-control qodef-form-element"
                                    name="<?php echo esc_attr( $name ); ?>">
                                <option value="-1"><?php esc_html_e( 'Default', 'moments' ); ?></option>
								<?php foreach ( $moments_qodef_fonts_array as $fontArray ) { ?>
                                    <option <?php if ( $value == str_replace( ' ', '+', $fontArray["family"] ) ) {
										echo "selected='selected'";
									} ?> value="<?php echo esc_attr( str_replace( ' ', '+', $fontArray["family"] ) ); ?>"><?php echo esc_html( $fontArray["family"] ); ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldFontSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_fonts_array;

		$class = '';

		if ( ! empty( $repeat ) ) {
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = moments_qodef_option_get_value( $name );
		}
		?>


        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>">
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <select class="form-control qodef-form-element"
                    name="<?php echo esc_attr( $name ); ?>">
                <option value="-1"><?php esc_html_e( 'Default', 'moments' ); ?></option>
				<?php foreach ( $moments_qodef_fonts_array as $fontArray ) { ?>
                    <option <?php if ( $value == str_replace( ' ', '+', $fontArray["family"] ) ) {
						echo "selected='selected'";
					} ?> value="<?php echo esc_attr( str_replace( ' ', '+', $fontArray["family"] ) ); ?>"><?php echo esc_html( $fontArray["family"] ); ?></option>
				<?php } ?>
            </select>
        </div>
		<?php

	}

}

class MomentsQodefFieldSelect extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if ( ! empty( $repeat ) ) {
			$id     = $name . '-' . $repeat['index'];
			$name   .= '[]';
			$rvalue = $repeat['value'];
			$class  = 'qodef-repeater-field';
		} else {
			$id     = $name;
			$rvalue = moments_qodef_option_get_value( $name );
		}

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		?>

        <div class="qodef-page-form-section <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $id ); ?>" <?php if ( $hidden ) { ?> style="display: none"<?php } ?>>


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-control qodef-form-element<?php if ( $dependence ) {
								echo " dependence";
							} ?>"
								<?php foreach ( $show as $key => $value ) { ?>
                                    data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
								<?php foreach ( $hide as $key => $value ) { ?>
                                    data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
                                    name="<?php echo esc_attr( $name ); ?>">
								<?php foreach ( $options as $key => $value ) {
									if ( $key == "-1" ) {
										$key = "";
									} ?>
                                    <option <?php if ( $rvalue == $key ) {
										echo "selected='selected'";
									} ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldSelectBlank extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_options;

		$class = '';

		if ( ! empty( $repeat ) ) {
			$name   .= '[]';
			$rvalue = $repeat['value'];
			$class  = 'qodef-repeater-field';
		} else {
			$rvalue = moments_qodef_option_get_value( $name );
		}

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		?>

        <div class="qodef-page-form-section"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content <?php echo esc_attr( $class ); ?>">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-control qodef-form-element<?php if ( $dependence ) {
								echo " dependence";
							} ?>"
								<?php foreach ( $show as $key => $value ) { ?>
                                    data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
								<?php foreach ( $hide as $key => $value ) { ?>
                                    data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
                                    name="<?php echo esc_attr( $name ); ?>">
                                <option <?php if ( $rvalue == "" ) {
									echo "selected='selected'";
								} ?> value=""></option>
								<?php foreach ( $options as $key => $value ) {
									if ( $key == "-1" ) {
										$key = "";
									} ?>
                                    <option <?php if ( $rvalue == $key ) {
										echo "selected='selected'";
									} ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldSelectSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_options;

		$class = '';
		if ( ! empty( $repeat ) ) {
			$name   .= '[]';
			$rvalue = $repeat['value'];
			$class  = 'qodef-repeater-field';
		} else {
			$rvalue = moments_qodef_option_get_value( $name );
		}

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		?>


        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>" id="qodef_<?php echo esc_attr( $name ); ?>" <?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <select class="form-control qodef-form-element<?php if ( $dependence ) {
				echo " dependence";
			} ?>"
				<?php foreach ( $show as $key => $value ) { ?>
                    data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
				<?php } ?>
				<?php foreach ( $hide as $key => $value ) { ?>
                    data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
				<?php } ?>
                    name="<?php echo esc_attr( $name ); ?>">
                <option <?php if ( $rvalue == "" ) {
					echo "selected='selected'";
				} ?> value=""></option>
				<?php foreach ( $options as $key => $value ) {
					if ( $key == "-1" ) {
						$key = "";
					} ?>
                    <option <?php if ( $rvalue == $key ) {
						echo "selected='selected'";
					} ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
				<?php } ?>
            </select>
        </div>
		<?php

	}

}

class MomentsQodefFieldSelectBlankSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_options;

		$class = '';
		if ( ! empty( $repeat ) ) {
			$name   .= '[]';
			$rvalue = $repeat['value'];
			$class  = 'qodef-repeater-field';
		} else {
			$rvalue = moments_qodef_option_get_value( $name );
		}

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		?>


        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>">
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <select class="form-control qodef-form-element<?php if ( $dependence ) {
				echo " dependence";
			} ?>"
				<?php foreach ( $show as $key => $value ) { ?>
                    data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
				<?php } ?>
				<?php foreach ( $hide as $key => $value ) { ?>
                    data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
				<?php } ?>
                    name="<?php echo esc_attr( $name ); ?>">
                <option <?php if ( $rvalue == "" ) {
					echo "selected='selected'";
				} ?> value=""></option>
				<?php foreach ( $options as $key => $value ) {
					if ( $key == "-1" ) {
						$key = "";
					} ?>
                    <option <?php if ( $rvalue == $key ) {
						echo "selected='selected'";
					} ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
				<?php } ?>
            </select>
        </div>
		<?php

	}

}

class MomentsQodefFieldYesNo extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_options;

		$class = '';

		if ( ! empty( $repeat ) ) {
			$id     = $name . '-' . $repeat['index'];
			$name   .= '[]';
			$rvalue = $repeat['value'];
			$class  = 'qodef-repeater-field';
		} else {
			$id     = $name;
			$rvalue = moments_qodef_option_get_value( $name );
		}

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $id ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr( $class ); ?>">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( $rvalue == "yes" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( $rvalue == "no" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_yesno" value="yes"<?php if ( $rvalue == "yes" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $rvalue ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}
}

class MomentsQodefFieldYesNoSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $moments_qodef_options;

		$class = '';

		if ( ! empty( $repeat ) ) {
			$name   .= '[]';
			$rvalue = $repeat['value'];
			$class  = 'qodef-repeater-field';
		} else {
			$rvalue = moments_qodef_option_get_value( $name );
		}

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="col-lg-3 <?php echo esc_attr( $class ); ?>">
            <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
            <p class="field switch">
                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                        class="cb-enable<?php if ( $rvalue == "yes" ) {
							echo " selected";
						} ?><?php if ( $dependence ) {
							echo " dependence";
						} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                        class="cb-disable<?php if ( $rvalue == "no" ) {
							echo " selected";
						} ?><?php if ( $dependence ) {
							echo " dependence";
						} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                <input type="checkbox" id="checkbox" class="checkbox"
                        name="<?php echo esc_attr( $name ); ?>_yesno" value="yes"<?php if ( $rvalue == "yes" ) {
					echo " selected";
				} ?>/>
                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $rvalue ); ?>"/>
            </p>
        </div>
		<?php

	}
}

class MomentsQodefFieldOnOff extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "on" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'On', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "off" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Off', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_onoff" value="on"<?php if ( moments_qodef_option_get_value( $name ) == "on" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldPortfolioFollow extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "portfolio_single_follow" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "portfolio_single_no_follow" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_portfoliofollow" value="portfolio_single_follow"<?php if ( moments_qodef_option_get_value( $name ) == "portfolio_single_follow" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldZeroOne extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "1" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "0" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_zeroone" value="1"<?php if ( moments_qodef_option_get_value( $name ) == "1" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldImageVideo extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch switch-type">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "image" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Image', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "video" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Video', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_imagevideo" value="image"<?php if ( moments_qodef_option_get_value( $name ) == "image" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldYesEmpty extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "yes" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_yesempty" value="yes"<?php if ( moments_qodef_option_get_value( $name ) == "yes" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldFlagPage extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "page" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_flagpage" value="page"<?php if ( moments_qodef_option_get_value( $name ) == "page" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldFlagPost extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {

		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "post" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_flagpost" value="post"<?php if ( moments_qodef_option_get_value( $name ) == "post" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldFlagMedia extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "attachment" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_flagmedia" value="attachment"<?php if ( moments_qodef_option_get_value( $name ) == "attachment" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldFlagPortfolio extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "portfolio_page" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_flagportfolio" value="portfolio_page"<?php if ( moments_qodef_option_get_value( $name ) == "portfolio_page" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldFlagProduct extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $moments_qodef_options;
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->


            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>"
                                        class="cb-enable<?php if ( moments_qodef_option_get_value( $name ) == "product" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'Yes', 'moments' ) ?></span></label>
                                <label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>"
                                        class="cb-disable<?php if ( moments_qodef_option_get_value( $name ) == "" ) {
											echo " selected";
										} ?><?php if ( $dependence ) {
											echo " dependence";
										} ?>"><span><?php esc_html_e( 'No', 'moments' ) ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                        name="<?php echo esc_attr( $name ); ?>_flagproduct" value="product"<?php if ( moments_qodef_option_get_value( $name ) == "product" ) {
									echo " selected";
								} ?>/>
                                <input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldRange extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$range_min      = 0;
		$range_max      = 1;
		$range_step     = 0.01;
		$range_decimals = 2;
		if ( isset( $args["range_min"] ) ) {
			$range_min = $args["range_min"];
		}
		if ( isset( $args["range_max"] ) ) {
			$range_max = $args["range_max"];
		}
		if ( isset( $args["range_step"] ) ) {
			$range_step = $args["range_step"];
		}
		if ( isset( $args["range_decimals"] ) ) {
			$range_decimals = $args["range_decimals"];
		}
		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="qodef-slider-range-wrapper">
                                <div class="form-inline">
                                    <input type="text"
                                            class="form-control qodef-form-element qodef-form-element-xsmall pull-left qodef-slider-range-value"
                                            name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>

                                    <div class="qodef-slider-range small"
                                            data-step="<?php echo esc_attr( $range_step ); ?>" data-min="<?php echo esc_attr( $range_min ); ?>" data-max="<?php echo esc_attr( $range_max ); ?>" data-decimals="<?php echo esc_attr( $range_decimals ); ?>" data-start="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}

}

class MomentsQodefFieldRangeSimple extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		?>

        <div class="col-lg-3" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
            <div class="qodef-slider-range-wrapper">
                <div class="form-inline">
                    <em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
                    <input type="text"
                            class="form-control qodef-form-element qodef-form-element-xxsmall pull-left qodef-slider-range-value"
                            name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"/>

                    <div class="qodef-slider-range xsmall"
                            data-step="0.01" data-max="1" data-start="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"></div>
                </div>

            </div>
        </div>
		<?php

	}

}

class MomentsQodefFieldRadio extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ( $default_value == $value ) {
			$checked = "checked";
		}
		$html = '<input type="radio" name="' . $name . '" value="' . $default_value . '" ' . $checked . ' /> ' . $label . '<br />';
		echo wp_kses( $html, array(
			'input' => array(
				'type'    => true,
				'name'    => true,
				'value'   => true,
				'checked' => true
			),
			'br'    => true
		) );

	}

}

class MomentsQodefFieldRadioGroup extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = isset( $args["dependence"] ) && $args["dependence"] ? true : false;
		$show       = ! empty( $args["show"] ) ? $args["show"] : array();
		$hide       = ! empty( $args["hide"] ) ? $args["hide"] : array();

		$use_images    = isset( $args["use_images"] ) && $args["use_images"] ? true : false;
		$hide_labels   = isset( $args["hide_labels"] ) && $args["hide_labels"] ? true : false;
		$hide_radios   = $use_images ? 'display: none' : '';
		$checked_value = moments_qodef_option_get_value( $name );
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>" <?php if ( $hidden ) { ?> style="display: none"<?php } ?>>

            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
							<?php if ( is_array( $options ) && count( $options ) ) { ?>
                                <div class="qodef-radio-group-holder <?php if ( $use_images ) {
									echo "with-images";
								} ?>">
									<?php foreach ( $options as $key => $atts ) {
										$selected = false;
										if ( $checked_value == $key ) {
											$selected = true;
										}

										$show_val = "";
										$hide_val = "";
										if ( $dependence ) {
											if ( array_key_exists( $key, $show ) ) {
												$show_val = $show[ $key ];
											}

											if ( array_key_exists( $key, $hide ) ) {
												$hide_val = $hide[ $key ];
											}
										}
										?>
                                        <label class="radio-inline">
                                            <input
												<?php echo moments_qodef_get_inline_attr( $show_val, 'data-show' ); ?>
												<?php echo moments_qodef_get_inline_attr( $hide_val, 'data-hide' ); ?>
												<?php if ( $selected ) {
													echo "checked";
												} ?> <?php moments_qodef_inline_style( $hide_radios ); ?>
                                                    type="radio"
                                                    name="<?php echo esc_attr( $name ); ?>"
                                                    value="<?php echo esc_attr( $key ); ?>"
												<?php if ( $dependence ) {
													moments_qodef_class_attribute( "dependence" );
												} ?>> <?php if ( ! empty( $atts["label"] ) && ! $hide_labels ) {
												echo esc_attr( $atts["label"] );
											} ?>

											<?php if ( $use_images ) { ?>
                                                <img title="<?php if ( ! empty( $atts["label"] ) ) {
													echo esc_attr( $atts["label"] );
												} ?>" src="<?php echo esc_url( $atts['image'] ); ?>" alt="<?php echo esc_attr( "$key image" ) ?>"/>
											<?php } ?>
                                        </label>
									<?php } ?>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php
	}

}

class MomentsQodefFieldCheckBox extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ( $default_value == $value ) {
			$checked = "checked";
		}
		$html = '<input type="checkbox" name="' . $name . '" value="' . $default_value . '" ' . $checked . ' /> ' . $label . '<br />';
		echo wp_kses( $html, array(
			'input' => array(
				'type'    => true,
				'name'    => true,
				'value'   => true,
				'checked' => true
			),
			'br'    => true
		) );
	}
}

class MomentsQodefFieldCheckBoxGroup extends MomentsQodefFieldType {

	public function render( $name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false ) {
		if ( ! ( is_array( $options ) && count( $options ) ) ) {
			return;
		}

		$saved_value = moments_qodef_option_get_value( $name );

		$enable_empty_checkbox = isset( $args["enable_empty_checkbox"] ) && $args["enable_empty_checkbox"] ? true : false;
		$inline_checkbox_class = isset( $args["inline_checkbox_class"] ) && $args["inline_checkbox_class"] ? 'checkbox-inline' : 'checkbox';
		?>
        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="qodef-checkbox-group-holder">
								<?php if ( $enable_empty_checkbox ) { ?>
                                    <div class="<?php echo esc_attr( $inline_checkbox_class ); ?>" style="display: none">
                                        <label>
                                            <input checked type="checkbox" value="" name="<?php echo esc_attr( $name . '[]' ); ?>">
                                        </label>
                                    </div>
								<?php } ?>
								<?php foreach ( $options as $option_key => $option_label ) : ?>
									<?php
									$i            = 1;
									$checked      = is_array( $saved_value ) && in_array( $option_key, $saved_value );
									$checked_attr = $checked ? 'checked' : '';
									?>

                                    <div class="<?php echo esc_attr( $inline_checkbox_class ); ?>">
                                        <label>
                                            <input <?php echo esc_attr( $checked_attr ); ?> type="checkbox" id="<?php echo esc_attr( $option_key ) . '-' . $i; ?>" value="<?php echo esc_attr( $option_key ); ?>" name="<?php echo esc_attr( $name . '[]' ); ?>">
                                            <label for="<?php echo esc_attr( $option_key ) . '-' . $i; ?>"><?php echo esc_html( $option_label ); ?></label>
                                        </label>
                                    </div>
									<?php $i ++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->
        </div>
		<?php
	}
}

class MomentsQodefFieldDate extends MomentsQodefFieldType {

	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if ( isset( $args["col_width"] ) ) {
			$col_width = $args["col_width"];
		}
		?>

        <div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $label ); ?></h4>

                <p><?php echo esc_html( $description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr( $col_width ); ?>">
                            <input type="text"
                                    id="portfolio_date"
                                    class="datepicker form-control qodef-input qodef-form-element"
                                    name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( moments_qodef_option_get_value( $name ) ); ?>"
                            /></div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php
	}
}

class MomentsQodefFieldFactory {

	public function render( $field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		switch ( strtolower( $field_type ) ) {

			case 'text':
				$field = new MomentsQodefFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textsimple':
				$field = new MomentsQodefFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textarea':
				$field = new MomentsQodefFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textareasimple':
				$field = new MomentsQodefFieldTextAreaSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textareahtml':
				$field = new MomentsQodefFieldTextAreaHtml();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'color':
				$field = new MomentsQodefFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'colorsimple':
				$field = new MomentsQodefFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'image':
				$field = new MomentsQodefFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'imagesimple':
				$field = new MomentsQodefFieldImageSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'font':
				$field = new MomentsQodefFieldFont();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'fontsimple':
				$field = new MomentsQodefFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'select':
				$field = new MomentsQodefFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'selectblank':
				$field = new MomentsQodefFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'selectsimple':
				$field = new MomentsQodefFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'selectblanksimple':
				$field = new MomentsQodefFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'yesno':
				$field = new MomentsQodefFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'yesnosimple':
				$field = new MomentsQodefFieldYesNoSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'onoff':
				$field = new MomentsQodefFieldOnOff();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'portfoliofollow':
				$field = new MomentsQodefFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'zeroone':
				$field = new MomentsQodefFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'imagevideo':
				$field = new MomentsQodefFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'yesempty':
				$field = new MomentsQodefFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagpost':
				$field = new MomentsQodefFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagpage':
				$field = new MomentsQodefFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagmedia':
				$field = new MomentsQodefFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagportfolio':
				$field = new MomentsQodefFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagproduct':
				$field = new MomentsQodefFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'range':
				$field = new MomentsQodefFieldRange();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'rangesimple':
				$field = new MomentsQodefFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'radio':
				$field = new MomentsQodefFieldRadio();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'checkbox':
				$field = new MomentsQodefFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'date':
				$field = new MomentsQodefFieldDate();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'radiogroup':
				$field = new MomentsQodefFieldRadioGroup();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'checkboxgroup':
				$field = new MomentsQodefFieldCheckBoxGroup();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			default:
				break;
		}
	}
}

/*
   Class: MomentsQodefMultipleImages
   A class that initializes Qode Multiple Images
*/

class MomentsQodefMultipleImages implements iMomentsQodefRender {
	private $name;
	private $label;
	private $description;


	function __construct( $name, $label = "", $description = "" ) {
		global $moments_qodef_Framework;
		$this->name        = $name;
		$this->label       = $label;
		$this->description = $description;
		$moments_qodef_Framework->qodeMetaBoxes->addOption( $this->name, "" );
	}

	public function render( $factory ) {
		global $post;
		?>

        <div class="qodef-page-form-section">


            <div class="qodef-field-desc">
                <h4><?php echo esc_html( $this->label ); ?></h4>

                <p><?php echo esc_html( $this->description ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="qode-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $this->name, true );

								if ( $image_gallery_val != '' ) {
									$image_gallery_array = explode( ',', $image_gallery_val );
								}

								if ( isset( $image_gallery_array ) && count( $image_gallery_array ) != 0 ):
									foreach ( $image_gallery_array as $gimg_id ):
										$gimage_wp = wp_get_attachment_image_src( $gimg_id, 'thumbnail', true );
										echo '<li class="qode-gallery-image-holder"><img src="' . esc_url( $gimage_wp[0] ) . '"/></li>';
									endforeach;
								endif;
								?>
                            </ul>
                            <input type="hidden" value="<?php echo esc_attr( $image_gallery_val ); ?>" id="<?php echo esc_attr( $this->name ) ?>" name="<?php echo esc_attr( $this->name ) ?>">
                            <div class="qodef-gallery-uploader">
                                <a class="qodef-gallery-upload-btn btn btn-sm btn-primary"
                                        href="javascript:void(0)"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                <a class="qodef-gallery-clear-btn btn btn-sm btn-default pull-right"
                                        href="javascript:void(0)"><?php esc_html_e( 'Remove All', 'moments' ); ?></a>
                            </div>
							<?php wp_nonce_field( 'qodef_gallery_upload_get_images_' . esc_attr( $this->name ), 'qodef_gallery_upload_get_images_' . esc_attr( $this->name ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
		<?php

	}
}

/*
   Class: MomentsQodefImagesVideos
   A class that initializes Qode Images Videos
*/

class MomentsQodefImagesVideos implements iMomentsQodefRender {
	private $label;
	private $description;


	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render( $factory ) {
		global $post;
		?>
        <div class="qodef_hidden_portfolio_images" style="display: none">
            <div class="qodef-page-form-section">


                <div class="qodef-field-desc">
                    <h4><?php echo esc_html( $this->label ); ?></h4>

                    <p><?php echo esc_html( $this->description ); ?></p>
                </div>
                <!-- close div.qodef-field-desc -->

                <div class="qodef-section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        id="portfolioimgordernumber_x"
                                        name="portfolioimgordernumber_x"
                                /></div>
                            <div class="col-lg-10">
                                <em class="qodef-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'moments' ); ?></em>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        id="portfoliotitle_x"
                                        name="portfoliotitle_x"
                                /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="qodef-field-description"><?php esc_html_e( 'Image', 'moments' ); ?></em>
                                <div class="qodef-media-uploader">
                                    <div style="display: none"
                                            class="qodef-media-image-holder">
                                        <img src=""
                                                class="qodef-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                            class="qodef-media-meta-fields">
                                        <input type="hidden" class="qodef-media-upload-url"
                                                name="portfolioimg_x"
                                                id="portfolioimg_x"/>
                                        <input type="hidden"
                                                class="qodef-media-upload-height"
                                                name="qode_options_theme[media-upload][height]"
                                                value=""/>
                                        <input type="hidden"
                                                class="qodef-media-upload-width"
                                                name="qode_options_theme[media-upload][width]"
                                                value=""/>
                                    </div>
                                    <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                            href="javascript:void(0)"
                                            data-frame-title="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"
                                            data-frame-button-text="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                            class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-3">
                                <em class="qodef-field-description"><?php esc_html_e( 'Video type', 'moments' ); ?></em>
                                <select class="form-control qodef-form-element qodef-portfoliovideotype"
                                        name="portfoliovideotype_x" id="portfoliovideotype_x">
                                    <option value=""></option>
                                    <option value="youtube"><?php esc_html_e( 'Youtube', 'moments' ); ?></option>
                                    <option value="vimeo"><?php esc_html_e( 'Vimeo', 'moments' ); ?></option>
                                    <option value="self"><?php esc_html_e( 'Self hosted', 'moments' ); ?></option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <em class="qodef-field-description"><?php esc_html_e( 'Video ID', 'moments' ); ?></em>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        id="portfoliovideoid_x"
                                        name="portfoliovideoid_x"
                                /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="qodef-field-description"><?php esc_html_e( 'Video image', 'moments' ); ?></em>
                                <div class="qodef-media-uploader">
                                    <div style="display: none"
                                            class="qodef-media-image-holder">
                                        <img src=""
                                                class="qodef-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                            class="qodef-media-meta-fields">
                                        <input type="hidden" class="qodef-media-upload-url"
                                                name="portfoliovideoimage_x"
                                                id="portfoliovideoimage_x"/>
                                        <input type="hidden"
                                                class="qodef-media-upload-height"
                                                name="qode_options_theme[media-upload][height]"
                                                value=""/>
                                        <input type="hidden"
                                                class="qodef-media-upload-width"
                                                name="qode_options_theme[media-upload][width]"
                                                value=""/>
                                    </div>
                                    <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                            href="javascript:void(0)"
                                            data-frame-title="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"
                                            data-frame-button-text="<?php esc_attr_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                            class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-4">
                                <em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'moments' ); ?></em>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        id="portfoliovideowebm_x"
                                        name="portfoliovideowebm_x"
                                /></div>
                            <div class="col-lg-4">
                                <em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'moments' ); ?></em>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        id="portfoliovideomp4_x"
                                        name="portfoliovideomp4_x"
                                /></div>
                            <div class="col-lg-4">
                                <em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'moments' ); ?></em>
                                <input type="text"
                                        class="form-control qodef-input qodef-form-element"
                                        id="portfoliovideoogv_x"
                                        name="portfoliovideoogv_x"
                                /></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <a class="qodef_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'moments' ); ?></a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- close div.qodef-section-content -->

            </div>
        </div>

		<?php
		$no               = 1;
		$portfolio_images = get_post_meta( $post->ID, 'qode_portfolio_images', true );
		if ( count( $portfolio_images ) > 1 ) {
			usort( $portfolio_images, "moments_qodef_compare_portfolio_videos" );
		}
		while ( isset( $portfolio_images[ $no - 1 ] ) ) {
			$portfolio_image = $portfolio_images[ $no - 1 ];
			?>
            <div class="qodef_portfolio_image" rel="<?php echo esc_attr( $no ); ?>" style="display: block;">

                <div class="qodef-page-form-section">


                    <div class="qodef-field-desc">
                        <h4><?php echo esc_html( $this->label ); ?></h4>

                        <p><?php echo esc_html( $this->description ); ?></p>
                    </div>
                    <!-- close div.qodef-field-desc -->

                    <div class="qodef-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                    <input type="text"
                                            class="form-control qodef-input qodef-form-element"
                                            id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>"
                                            name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ) : ""; ?>"
                                    /></div>
                                <div class="col-lg-10">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'moments' ); ?></em>
                                    <input type="text"
                                            class="form-control qodef-input qodef-form-element"
                                            id="portfoliotitle_<?php echo esc_attr( $no ); ?>"
                                            name="portfoliotitle[]" value="<?php echo isset( $portfolio_image['portfoliotitle'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliotitle'] ) ) : ""; ?>"
                                    /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Image', 'moments' ); ?></em>
                                    <div class="qodef-media-uploader">
                                        <div<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == false ) { ?> style="display: none"<?php } ?>
                                                class="qodef-media-image-holder">

                                            <img src="<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
												echo esc_url( moments_qodef_get_attachment_thumb_url( stripslashes( $portfolio_image['portfolioimg'] ) ) );
											} ?>" alt="<?php esc_attr_e( 'Media Image', 'moments' ); ?>"
                                                    class="qodef-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                                class="qodef-media-meta-fields">
                                            <input type="hidden" class="qodef-media-upload-url"
                                                    name="portfolioimg[]"
                                                    id="portfolioimg_<?php echo esc_attr( $no ); ?>"
                                                    value="<?php echo stripslashes( $portfolio_image['portfolioimg'] ); ?>"/>
                                            <input type="hidden"
                                                    class="qodef-media-upload-height"
                                                    name="qode_options_theme[media-upload][height]"
                                                    value=""/>
                                            <input type="hidden"
                                                    class="qodef-media-upload-width"
                                                    name="qode_options_theme[media-upload][width]"
                                                    value=""/>
                                        </div>
                                        <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                                href="javascript:void(0)"
                                                data-frame-title="<?php esc_html_e( 'Select Image', 'moments' ); ?>"
                                                data-frame-button-text="<?php esc_html_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                                class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Video type', 'moments' ); ?></em>
                                    <select class="form-control qodef-form-element qodef-portfoliovideotype"
                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>">
                                        <option value=""></option>
                                        <option <?php if ( $portfolio_image['portfoliovideotype'] == "youtube" ) {
											echo "selected='selected'";
										} ?> value="youtube">Youtube
                                        </option>
                                        <option <?php if ( $portfolio_image['portfoliovideotype'] == "vimeo" ) {
											echo "selected='selected'";
										} ?> value="vimeo">Vimeo
                                        </option>
                                        <option <?php if ( $portfolio_image['portfoliovideotype'] == "self" ) {
											echo "selected='selected'";
										} ?> value="self">Self hosted
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Video ID', 'moments' ); ?></em>
                                    <input type="text"
                                            class="form-control qodef-input qodef-form-element"
                                            id="portfoliovideoid_<?php echo esc_attr( $no ); ?>"
                                            name="portfoliovideoid[]" value="<?php echo isset( $portfolio_image['portfoliovideoid'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideoid'] ) ) : ""; ?>"
                                    /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Video image', 'moments' ); ?></em>
                                    <div class="qodef-media-uploader">
                                        <div<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == false ) { ?> style="display: none"<?php } ?>
                                                class="qodef-media-image-holder">
                                            <img src="<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == true ) {
												echo esc_url( moments_qodef_get_attachment_thumb_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) ) );
											} ?>" alt="<?php esc_attr_e( 'Media Image', 'moments' ); ?>"
                                                    class="qodef-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                                class="qodef-media-meta-fields">
                                            <input type="hidden" class="qodef-media-upload-url"
                                                    name="portfoliovideoimage[]"
                                                    id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>"
                                                    value="<?php echo stripslashes( $portfolio_image['portfoliovideoimage'] ); ?>"/>
                                            <input type="hidden"
                                                    class="qodef-media-upload-height"
                                                    name="qode_options_theme[media-upload][height]"
                                                    value=""/>
                                            <input type="hidden"
                                                    class="qodef-media-upload-width"
                                                    name="qode_options_theme[media-upload][width]"
                                                    value=""/>
                                        </div>
                                        <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                                href="javascript:void(0)"
                                                data-frame-title="<?php esc_html_e( 'Select Image', 'moments' ); ?>"
                                                data-frame-button-text="<?php esc_html_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                                class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-4">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'moments' ); ?></em>
                                    <input type="text"
                                            class="form-control qodef-input qodef-form-element"
                                            id="portfoliovideowebm_<?php echo esc_attr( $no ); ?>"
                                            name="portfoliovideowebm[]" value="<?php echo isset( $portfolio_image['portfoliovideowebm'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideowebm'] ) ) : ""; ?>"
                                    /></div>
                                <div class="col-lg-4">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'moments' ); ?></em>
                                    <input type="text"
                                            class="form-control qodef-input qodef-form-element"
                                            id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>"
                                            name="portfoliovideomp4[]" value="<?php echo isset( $portfolio_image['portfoliovideomp4'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideomp4'] ) ) : ""; ?>"
                                    /></div>
                                <div class="col-lg-4">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'moments' ); ?></em>
                                    <input type="text"
                                            class="form-control qodef-input qodef-form-element"
                                            id="portfoliovideoogv_<?php echo esc_attr( $no ); ?>"
                                            name="portfoliovideoogv[]" value="<?php echo isset( $portfolio_image['portfoliovideoogv'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideoogv'] ) ) : ""; ?>"
                                    /></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <a class="qodef_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'moments' ); ?></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- close div.qodef-section-content -->

                </div>
            </div>
			<?php
			$no ++;
		}
		?>
        <br/>
        <a class="qodef_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e( 'Add portfolio image/video', 'moments' ); ?></a>
		<?php

	}
}


/*
   Class: MomentsQodefImagesVideos
   A class that initializes Qode Images Videos
*/

class MomentsQodefImagesVideosFramework implements iMomentsQodefRender {
	private $label;
	private $description;


	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render( $factory ) {
		global $post;
		?>

        <!--Image hidden start-->
        <div class="qodef-hidden-portfolio-images" style="display: none">
            <div class="qodef-portfolio-toggle-holder">
                <div class="qodef-portfolio-toggle qodef-toggle-desc">
                    <span class="number">1</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Image - ', 'moments' ); ?><em><?php esc_html_e( '(Order Number, Image Title)', 'moments' ); ?></em></span>
                </div>
                <div class="qodef-portfolio-toggle qodef-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="qodef-portfolio-toggle-content">
                <div class="qodef-page-form-section">
                    <div class="qodef-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="qodef-media-uploader">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Image ', 'moments' ); ?></em>
                                        <div style="display: none" class="qodef-media-image-holder">
                                            <img src="" class="qodef-media-image img-thumbnail">
                                        </div>
                                        <div class="qodef-media-meta-fields">
                                            <input type="hidden" class="qodef-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
                                            <input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'moments' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
                                </div>
                                <div class="col-lg-8">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x">
                                </div>
                            </div>
                            <input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                            <input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
                            <input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
                            <input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
                            <input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
                            <input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

                        </div><!-- close div.container-fluid -->
                    </div><!-- close div.qodef-section-content -->
                </div>
            </div>
        </div>
        <!--Image hidden End-->

        <!--Video Hidden Start-->
        <div class="qodef-hidden-portfolio-videos" style="display: none">
            <div class="qodef-portfolio-toggle-holder">
                <div class="qodef-portfolio-toggle qodef-toggle-desc">
                    <span class="number">2</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Video - ', 'moments' ); ?><em><?php esc_html_e( '(Order Number, Video Title)', 'moments' ); ?></em></span>
                </div>
                <div class="qodef-portfolio-toggle qodef-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="qodef-portfolio-toggle-content">
                <div class="qodef-page-form-section">
                    <div class="qodef-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="qodef-media-uploader">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Cover Video Image ', 'moments' ); ?></em>
                                        <div style="display: none" class="qodef-media-image-holder">
                                            <img src="" class="qodef-media-image img-thumbnail">
                                        </div>
                                        <div style="display: none" class="qodef-media-meta-fields">
                                            <input type="hidden" class="qodef-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                                            <input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'moments' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
                                        </div>
                                        <div class="col-lg-10">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected)', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x">
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Video type', 'moments' ); ?></em>
                                            <select class="form-control qodef-form-element qodef-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
                                                <option value=""></option>
                                                <option value="youtube"><?php esc_html_e( 'Youtube', 'moments' ); ?></option>
                                                <option value="vimeo"><?php esc_html_e( 'Vimeo', 'moments' ); ?></option>
                                                <option value="self"><?php esc_html_e( 'Self hosted', 'moments' ); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 qodef-video-id-holder">
                                            <em class="qodef-field-description" id="videoId"><?php esc_html_e( 'Video ID', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x">
                                        </div>
                                    </div>

                                    <div class="row next-row qodef-video-self-hosted-path-holder">
                                        <div class="col-lg-4">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x">
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x">
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
                        </div><!-- close div.container-fluid -->
                    </div><!-- close div.qodef-section-content -->
                </div>
            </div>
        </div>
        <!--Video Hidden End-->


		<?php
		$no               = 1;
		$portfolio_images = get_post_meta( $post->ID, 'qode_portfolio_images', true );

		if ( ! empty( $portfolio_images ) && count( $portfolio_images ) > 1 ) {
			usort( $portfolio_images, "moments_qodef_compare_portfolio_videos" );
		}

		while ( isset( $portfolio_images[ $no - 1 ] ) ) {
			$portfolio_image = $portfolio_images[ $no - 1 ];
			if ( isset( $portfolio_image['portfolioimgtype'] ) ) {
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			} else {
				if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
					$portfolio_img_type = "image";
				} else {
					$portfolio_img_type = "video";
				}
			}
			if ( $portfolio_img_type == "image" ) {
				?>

                <div class="qodef-portfolio-images qodef-portfolio-media" rel="<?php echo esc_attr( $no ); ?>">
                    <div class="qodef-portfolio-toggle-holder">
                        <div class="qodef-portfolio-toggle qodef-toggle-desc">
                            <span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Image - ', 'moments' ); ?><em>(<?php echo stripslashes( $portfolio_image['portfolioimgordernumber'] ); ?><?php esc_html_e( ', ', 'moments' ); ?><?php echo stripslashes( $portfolio_image['portfoliotitle'] ); ?>)</em></span>
                        </div>
                        <div class="qodef-portfolio-toggle qodef-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="qodef-portfolio-toggle-content" style="display: none">
                        <div class="qodef-page-form-section">
                            <div class="qodef-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="qodef-media-uploader">
                                                <em class="qodef-field-description"><?php esc_html_e( 'Image ', 'moments' ); ?></em>
                                                <div<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == false ) { ?> style="display: none"<?php } ?>
                                                        class="qodef-media-image-holder">
                                                    <img src="<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
														echo esc_url( moments_qodef_get_attachment_thumb_url( stripslashes( $portfolio_image['portfolioimg'] ) ) );
													} ?>"
                                                            class="qodef-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                        class="qodef-media-meta-fields">
                                                    <input type="hidden" class="qodef-media-upload-url"
                                                            name="portfolioimg[]"
                                                            id="portfolioimg_<?php echo esc_attr( $no ); ?>"
                                                            value="<?php echo stripslashes( $portfolio_image['portfolioimg'] ); ?>"/>
                                                    <input type="hidden"
                                                            class="qodef-media-upload-height"
                                                            name="qode_options_theme[media-upload][height]"
                                                            value=""/>
                                                    <input type="hidden"
                                                            class="qodef-media-upload-width"
                                                            name="qode_options_theme[media-upload][width]"
                                                            value=""/>
                                                </div>
                                                <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                                        href="javascript:void(0)"
                                                        data-frame-title="<?php esc_html_e( 'Select Image', 'moments' ); ?>"
                                                        data-frame-button-text="<?php esc_html_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                        class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ) : ""; ?>">
                                        </div>
                                        <div class="col-lg-8">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo esc_attr( $no ); ?>" name="portfoliotitle[]" value="<?php echo isset( $portfolio_image['portfoliotitle'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliotitle'] ) ) : ""; ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" name="portfoliovideoimage[]">
                                    <input type="hidden" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>" name="portfoliovideotype[]">
                                    <input type="hidden" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]">
                                    <input type="hidden" id="portfoliovideowebm_<?php echo esc_attr( $no ); ?>" name="portfoliovideowebm[]">
                                    <input type="hidden" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]">
                                    <input type="hidden" id="portfoliovideoogv_<?php echo esc_attr( $no ); ?>" name="portfoliovideoogv[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr( $no ); ?>" name="portfolioimgtype[]" value="image">
                                </div><!-- close div.container-fluid -->
                            </div><!-- close div.qodef-section-content -->
                        </div>
                    </div>
                </div>

				<?php
			} else {
				?>
                <div class="qodef-portfolio-videos qodef-portfolio-media" rel="<?php echo esc_attr( $no ); ?>">
                    <div class="qodef-portfolio-toggle-holder">
                        <div class="qodef-portfolio-toggle qodef-toggle-desc">
                            <span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Video - ', 'moments' ); ?><em>(<?php echo stripslashes( $portfolio_image['portfolioimgordernumber'] ); ?><?php esc_html_e( ', ', 'moments' ); ?><?php echo stripslashes( $portfolio_image['portfoliotitle'] ); ?></em><?php esc_html_e( ') ', 'moments' ); ?></span>
                        </div>
                        <div class="qodef-portfolio-toggle qodef-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="qodef-portfolio-toggle-content" style="display: none">
                        <div class="qodef-page-form-section">
                            <div class="qodef-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="qodef-media-uploader">
                                                <em class="qodef-field-description"><?php esc_html_e( 'Cover Video Image ', 'moments' ); ?></em>
                                                <div<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == false ) { ?> style="display: none"<?php } ?>
                                                        class="qodef-media-image-holder">
                                                    <img src="<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == true ) {
														echo esc_url( moments_qodef_get_attachment_thumb_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) ) );
													} ?>"
                                                            class="qodef-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                        class="qodef-media-meta-fields">
                                                    <input type="hidden" class="qodef-media-upload-url"
                                                            name="portfoliovideoimage[]"
                                                            id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>"
                                                            value="<?php echo stripslashes( $portfolio_image['portfoliovideoimage'] ); ?>"/>
                                                    <input type="hidden"
                                                            class="qodef-media-upload-height"
                                                            name="qode_options_theme[media-upload][height]"
                                                            value=""/>
                                                    <input type="hidden"
                                                            class="qodef-media-upload-width"
                                                            name="qode_options_theme[media-upload][width]"
                                                            value=""/>
                                                </div>
                                                <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                                        href="javascript:void(0)"
                                                        data-frame-title="<?php esc_html_e( 'Select Image', 'moments' ); ?>"
                                                        data-frame-button-text="<?php esc_html_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                        class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                                    <input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ) : ""; ?>">
                                                </div>
                                                <div class="col-lg-10">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected) ', 'moments' ); ?></em>
                                                    <input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo esc_attr( $no ); ?>" name="portfoliotitle[]" value="<?php echo isset( $portfolio_image['portfoliotitle'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliotitle'] ) ) : ""; ?>">
                                                </div>
                                            </div>
                                            <div class="row next-row">
                                                <div class="col-lg-2">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Video Type', 'moments' ); ?></em>
                                                    <select class="form-control qodef-form-element qodef-portfoliovideotype"
                                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>">
                                                        <option value=""></option>
                                                        <option <?php if ( $portfolio_image['portfoliovideotype'] == "youtube" ) {
															echo "selected='selected'";
														} ?> value="youtube">Youtube
                                                        </option>
                                                        <option <?php if ( $portfolio_image['portfoliovideotype'] == "vimeo" ) {
															echo "selected='selected'";
														} ?> value="vimeo">Vimeo
                                                        </option>
                                                        <option <?php if ( $portfolio_image['portfoliovideotype'] == "self" ) {
															echo "selected='selected'";
														} ?> value="self">Self hosted
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 qodef-video-id-holder">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Video ID', 'moments' ); ?></em>
                                                    <input type="text"
                                                            class="form-control qodef-input qodef-form-element"
                                                            id="portfoliovideoid_<?php echo esc_attr( $no ); ?>"
                                                            name="portfoliovideoid[]" value="<?php echo isset( $portfolio_image['portfoliovideoid'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideoid'] ) ) : ""; ?>"
                                                    />
                                                </div>
                                            </div>

                                            <div class="row next-row qodef-video-self-hosted-path-holder">
                                                <div class="col-lg-4">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'moments' ); ?></em>
                                                    <input type="text"
                                                            class="form-control qodef-input qodef-form-element"
                                                            id="portfoliovideowebm_<?php echo esc_attr( $no ); ?>"
                                                            name="portfoliovideowebm[]" value="<?php echo isset( $portfolio_image['portfoliovideowebm'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideowebm'] ) ) : ""; ?>"
                                                    /></div>
                                                <div class="col-lg-4">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'moments' ); ?></em>
                                                    <input type="text"
                                                            class="form-control qodef-input qodef-form-element"
                                                            id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>"
                                                            name="portfoliovideomp4[]" value="<?php echo isset( $portfolio_image['portfoliovideomp4'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideomp4'] ) ) : ""; ?>"
                                                    /></div>
                                                <div class="col-lg-4">
                                                    <em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'moments' ); ?></em>
                                                    <input type="text"
                                                            class="form-control qodef-input qodef-form-element"
                                                            id="portfoliovideoogv_<?php echo esc_attr( $no ); ?>"
                                                            name="portfoliovideoogv[]" value="<?php echo isset( $portfolio_image['portfoliovideoogv'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideoogv'] ) ) : ""; ?>"
                                                    /></div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="portfolioimg_<?php echo esc_attr( $no ); ?>" name="portfolioimg[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr( $no ); ?>" name="portfolioimgtype[]" value="video">
                                </div><!-- close div.container-fluid -->
                            </div><!-- close div.qodef-section-content -->
                        </div>
                    </div>
                </div>
				<?php
			}
			$no ++;
		}
		?>

        <div class="qodef-portfolio-add">
            <a class="qodef-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e( ' Add Image', 'moments' ); ?>
            </a>
            <a class="qodef-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e( ' Add Video', 'moments' ); ?>
            </a>

            <a class="qodef-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'moments' ); ?></a>
        </div>
		<?php

	}
}

class MomentsQodefTwitterFramework implements iMomentsQodefRender {
	public function render( $factory ) {
		$twitterApi = QodefTwitterApi::getInstance();
		$message    = '';

		if ( ! empty( $_GET['oauth_token'] ) && ! empty( $_GET['oauth_verifier'] ) ) {
			if ( ! empty( $_GET['oauth_token'] ) ) {
				update_option( $twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token'] );
			}

			if ( ! empty( $_GET['oauth_verifier'] ) ) {
				update_option( $twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier'] );
			}

			$responseObj = $twitterApi->obtainAccessToken();
			if ( $responseObj->status ) {
				$message = esc_html__( 'You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'moments' );
			} else {
				$message = $responseObj->message;
			}
		}

		$buttonText = $twitterApi->hasUserConnected() ? esc_html__( 'Re-connect with Twitter', 'moments' ) : esc_html__( 'Connect with Twitter', 'moments' );
		?>
		<?php if ( $message !== '' ) { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html( $message ); ?></span>
            </div>
		<?php } ?>
        <div class="qodef-page-form-section" id="qodef_enable_social_share_twitter">

            <div class="qodef-field-desc">
                <h4><?php esc_html_e( 'Connect with Twitter', 'moments' ); ?></h4>

                <p><?php esc_html_e( 'Connecting with Twitter will enable you to show your latest tweets on your site', 'moments' ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="qodef-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html( $buttonText ); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url( $twitterApi->buildCurrentPageURI() ); ?>"/>
							<?php wp_nonce_field( 'qodef_twitter_connect_nonce', 'qodef_twitter_connect_nonce' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
	<?php }
}

class MomentsQodefInstagramFramework implements iMomentsQodefRender {
	public function render( $factory ) {
		$instagram_api = QodefInstagramApi::getInstance();
		$message       = '';

		//if code wasn't saved to database
		if ( ! get_option( 'qodef_instagram_code' ) ) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if ( ! empty( $_GET['code'] ) ) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__( 'You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'moments' );

			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}

		$buttonText = $instagram_api->hasUserConnected() ? esc_html__( 'Re-connect with Instagram', 'moments' ) : esc_html__( 'Connect with Instagram', 'moments' );

		?>
		<?php if ( $message !== '' ) { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html( $message ); ?></span>
            </div>
		<?php } ?>
        <div class="qodef-page-form-section" id="qodef_enable_social_share_instagram">

            <div class="qodef-field-desc">
                <h4><?php esc_html_e( 'Connect with Instagram', 'moments' ); ?></h4>

                <p><?php esc_html_e( 'Connecting with Instagram will enable you to show your latest photos on your site', 'moments' ); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->getAuthorizeUrl() ); ?>"><?php echo esc_html( $buttonText ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
	<?php }
}

/*
   Class: MomentsQodefImagesVideos
   A class that initializes Qode Images Videos
*/

class MomentsQodefOptionsFramework implements iMomentsQodefRender {
	private $label;
	private $description;


	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render( $factory ) {
		global $post;
		?>

        <div class="qodef-portfolio-additional-item-holder" style="display: none">
            <div class="qodef-portfolio-toggle-holder">
                <div class="qodef-portfolio-toggle qodef-toggle-desc">
                    <span class="number">1</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item ', 'moments' ); ?><em><?php esc_html_e( '(Order Number, Item Title)', 'moments' ); ?></em></span>
                </div>
                <div class="qodef-portfolio-toggle qodef-portfolio-control">
                    <span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="qodef-portfolio-toggle-content">
                <div class="qodef-page-form-section">
                    <div class="qodef-section-content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-2">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x">
                                </div>
                                <div class="col-lg-10">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Item Title ', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="optionLabel_x" name="optionLabel_x">
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Item Text', 'moments' ); ?></em>
                                    <textarea class="form-control qodef-input qodef-form-element" id="optionValue_x" name="optionValue_x"></textarea>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="optionUrl_x" name="optionUrl_x">
                                </div>
                            </div>
                        </div><!-- close div.qodef-section-content -->
                    </div><!-- close div.container-fluid -->
                </div>
            </div>
        </div>
		<?php
		$no         = 1;
		$portfolios = get_post_meta( $post->ID, 'qode_portfolios', true );

		if ( ! empty( $portfolios ) && count( $portfolios ) > 1 ) {
			usort( $portfolios, "moments_qodef_compare_portfolio_options" );
		}

		while ( isset( $portfolios[ $no - 1 ] ) ) {
			$portfolio = $portfolios[ $no - 1 ];
			?>
            <div class="qodef-portfolio-additional-item" rel="<?php echo esc_attr( $no ); ?>">
                <div class="qodef-portfolio-toggle-holder">
                    <div class="qodef-portfolio-toggle qodef-toggle-desc">
                        <span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item - ', 'moments' ); ?><em>(<?php echo stripslashes( $portfolio['optionlabelordernumber'] ); ?><?php esc_html_e( ', ', 'moments' ); ?><?php echo stripslashes( $portfolio['optionLabel'] ); ?>)</em></span>
                    </div>
                    <div class="qodef-portfolio-toggle qodef-portfolio-control">
                        <span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
                        <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="qodef-portfolio-toggle-content" style="display: none">
                    <div class="qodef-page-form-section">
                        <div class="qodef-section-content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="optionlabelordernumber_<?php echo esc_attr( $no ); ?>" name="optionlabelordernumber[]" value="<?php echo isset( $portfolio['optionlabelordernumber'] ) ? esc_attr( stripslashes( $portfolio['optionlabelordernumber'] ) ) : ""; ?>">
                                    </div>
                                    <div class="col-lg-10">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Item Title ', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="optionLabel_<?php echo esc_attr( $no ); ?>" name="optionLabel[]" value="<?php echo esc_attr( stripslashes( $portfolio['optionLabel'] ) ); ?>">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Item Text', 'moments' ); ?></em>
                                        <textarea class="form-control qodef-input qodef-form-element" id="optionValue_<?php echo esc_attr( $no ); ?>" name="optionValue[]"><?php echo esc_attr( stripslashes( $portfolio['optionValue'] ) ); ?></textarea>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="optionUrl_<?php echo esc_attr( $no ); ?>" name="optionUrl[]" value="<?php echo stripslashes( $portfolio['optionUrl'] ); ?>">
                                    </div>
                                </div>
                            </div><!-- close div.qodef-section-content -->
                        </div><!-- close div.container-fluid -->
                    </div>
                </div>
            </div>
			<?php
			$no ++;
		}
		?>

        <div class="qodef-portfolio-add">
            <a class="qodef-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( ' Add New Item', 'moments' ); ?></a>


            <a class="qodef-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'moments' ); ?></a>
        </div>


		<?php

	}
}


/*
   Class: MomentsQodefSlideElementsFramework
   A class that initializes elements for Slider
*/

class MomentsQodefSlideElementsFramework implements iMomentsQodefRender {
	private $label;
	private $description;


	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render( $factory ) {
		global $post;
		global $moments_qodef_fonts_array;
		global $moments_qodef_IconCollections;

		$custom_positions     = get_post_meta( $post->ID, 'qodef_slide_holder_elements_alignment', true ) == 'custom';
		$default_screen_width = get_post_meta( $post->ID, 'qodef_slide_elements_default_width', true );
		if ( $default_screen_width == '' ) {
			$default_screen_width = 1920;
		}

		$screen_widths = array(
			// These values must match those in map.php (for slider), slider.php and shortcodes.js
			"mobile"  => 600,
			"tabletp" => 800,
			"tabletl" => 1024,
			"laptop"  => 1440
		);
		?>

        <div class="qodef-slide-element-additional-item-holder" style="display: none">
            <div class="qodef-slide-element-toggle-holder">
                <div class="qodef-slide-element-toggle qodef-toggle-desc">
                    <span class="number">1</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Slide Element', 'moments' ); ?></span>
                </div>
                <div class="qodef-slide-element-toggle qodef-slide-element-control">
                    <span class="toggle-slide-element-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-slide-element-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="qodef-slide-element-toggle-content">
                <div class="qodef-page-form-section">
                    <div class="qodef-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Element Type', 'moments' ); ?></em>
                                    <select class="form-control qodef-input qodef-form-element qodef-slide-element-type-selector" id="slideelementtype_x" name="slideelementtype_x">
                                        <option value="text"><?php esc_html_e( 'Text', 'moments' ); ?></option>
                                        <option value="image"><?php esc_html_e( 'Image', 'moments' ); ?></option>
                                        <option value="button"><?php esc_html_e( 'Button', 'moments' ); ?></option>
                                        <option value="section-link"><?php esc_html_e( 'Anchor Link', 'moments' ); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-9">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Element Name (For Your Own Reference)', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementname_x" name="slideelementname_x">
                                </div>
                            </div>
                            <div class="row next-row qodef-slide-element-type-fields qodef-setf-section-link" style="display: none">
                                <div class="col-lg-12">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Anchor Link is always rendered at the bottom of the slide, centrally aligned.', 'moments' ); ?></em>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="qodef-field-description">Element Visible?</em>
                                    <select class="form-control qodef-input qodef-form-element" id="slideelementvisible_x" name="slideelementvisible_x">
                                        <option value="yes"><?php esc_html_e( 'Yes', 'moments' ); ?></option>
                                        <option value="no"><?php esc_html_e( 'No', 'moments' ); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                    <em class="qodef-field-description"><?php esc_html_e( 'Pivot Point', 'moments' ); ?></em>
                                    <select class="form-control qodef-input qodef-form-element" id="slideelementpivot_x" name="slideelementpivot_x">
                                        <option value="top-left"><?php esc_html_e( 'Top - Left', 'moments' ); ?></option>
                                        <option value="top-center"><?php esc_html_e( 'Top - Center', 'moments' ); ?></option>
                                        <option value="top-right"><?php esc_html_e( 'Top - Right', 'moments' ); ?></option>
                                        <option value="middle-left"><?php esc_html_e( 'Middle - Left', 'moments' ); ?></option>
                                        <option value="middle-center"><?php esc_html_e( 'Middle - Center', 'moments' ); ?></option>
                                        <option value="middle-right"><?php esc_html_e( 'Middle - Right', 'moments' ); ?></option>
                                        <option value="bottom-left"><?php esc_html_e( 'Bottom - Left', 'moments' ); ?></option>
                                        <option value="bottom-center"><?php esc_html_e( 'Bottom - Center', 'moments' ); ?></option>
                                        <option value="bottom-right"><?php esc_html_e( 'Bottom - Right', 'moments' ); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                    <em class="qodef-field-description"><?php esc_html_e( 'Order', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementzindex_x" name="slideelementzindex_x" value="">
                                </div>
                            </div>
                            <div class="row next-row qodef-slide-element-all-but-custom"<?php if ( $custom_positions ) { ?> style="display:none"<?php } ?>>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Margin - Top (px)', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmargintop_x" name="slideelementmargintop_x">
                                </div>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Margin - Bottom (px)', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmarginbottom_x" name="slideelementmarginbottom_x">
                                </div>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Margin - Left (px)', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmarginleft_x" name="slideelementmarginleft_x">
                                </div>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Margin - Right (px)', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmarginright_x" name="slideelementmarginright_x">
                                </div>
                            </div>

                            <div class="qodef-slide-element-type-fields qodef-setf-text">
                                <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative width (F/C*100 or blank for auto width)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextwidth_x" name="slideelementtextwidth_x" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative height (G/D*100 or blank for auto height)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextheight_x" name="slideelementtextheight_x" value="">
                                    </div>
                                </div>
                                <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextleft_x" name="slideelementtextleft_x" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtexttop_x" name="slideelementtexttop_x" value="">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Item Text', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtext_x" name="slideelementtext_x" value="">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Link', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextlink_x" name="slideelementtextlink_x">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Target', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementtexttarget_x" name="slideelementtexttarget_x">
                                            <option value="_self"><?php esc_html_e( 'Self', 'moments' ); ?></option>
                                            <option value="_blank"><?php esc_html_e( 'Blank', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Hover Color for Link', 'moments' ); ?></em>
                                        <input type="text" id="slideelementtextlinkhovercolor_x" name="slideelementtextlinkhovercolor_x" class="my-color-field"/>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Text Style', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementtextstyle_x" name="slideelementtextstyle_x">
                                            <option value="small"><?php esc_html_e( 'Small Text', 'moments' ); ?></option>
                                            <option value="normal" selected><?php esc_html_e( 'Normal Text', 'moments' ); ?></option>
                                            <option value="large"><?php esc_html_e( 'Large Text', 'moments' ); ?></option>
                                            <option value="extra-large"><?php esc_html_e( 'Extra Large Text', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Text Style Options', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element qodef-slide-element-options-selector-text" id="slideelementtextoptions_x" name="slideelementtextoptions_x">
                                            <option value="simple"><?php esc_html_e( 'Simple', 'moments' ); ?></option>
                                            <option value="advanced"><?php esc_html_e( 'Advanced', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="qodef-slide-elements-advanced-text-options" style="display: none">
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Color', 'moments' ); ?></em>
                                            <input type="text" id="slideelementfontcolor_x" name="slideelementfontcolor_x" value="" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Size (px)', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementfontsize_x" name="slideelementfontsize_x" value="">
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Line Height (px)', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementlineheight_x" name="slideelementlineheight_x" value="">
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Letter Spacing (px)', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementletterspacing_x" name="slideelementletterspacing_x" value="">
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Family', 'moments' ); ?></em>
                                            <select class="form-control qodef-input qodef-form-element"
                                                    id="slideelementfontfamily_x"
                                                    name="slideelementfontfamily_x"
                                            >
                                                <option value="-1"><?php esc_html_e( 'Default', 'moments' ); ?></option>
												<?php foreach ( $moments_qodef_fonts_array as $fontArray ) { ?>
                                                    <option value="<?php echo esc_attr( str_replace( ' ', '+', $fontArray["family"] ) ); ?>"><?php echo esc_html( $fontArray["family"] ); ?></option>
												<?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Style', 'moments' ); ?></em>
                                            <select class="form-control qodef-input qodef-form-element" id="slideelementfontstyle_x" name="slideelementfontstyle_x">
                                                <option value=""></option>
                                                <option value="normal"><?php esc_html_e( 'normal', 'moments' ); ?></option>
                                                <option value="italic"><?php esc_html_e( 'italic', 'moments' ); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Weight', 'moments' ); ?></em>
                                            <select class="form-control qodef-input qodef-form-element" id="slideelementfontweight_x" name="slideelementfontweight_x">
                                                <option value=""></option>
												<?php for ( $i = 1; $i <= 9; $i ++ ) { ?>
                                                    <option value="<?php echo esc_attr( $i * 100 ); ?>"><?php echo esc_html( $i * 100 ); ?></option>
												<?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Text Transform', 'moments' ); ?></em>
                                            <select class="form-control qodef-input qodef-form-element" id="slideelementtexttransform_x" name="slideelementtexttransform_x">
                                                <option value=""></option>
                                                <option value="none"><?php esc_html_e( 'None', 'moments' ); ?></option>
                                                <option value="capitalize"><?php esc_html_e( 'Capitalize', 'moments' ); ?></option>
                                                <option value="uppercase"><?php esc_html_e( 'Uppercase', 'moments' ); ?></option>
                                                <option value="lowercase"><?php esc_html_e( 'Lowercase', 'moments' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Background Color', 'moments' ); ?></em>
                                            <input type="text" id="slideelementtextbgndcolor_x; ?>" name="slideelementtextbgndcolor_x" value="" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Background Transparency (0-1)', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextbgndtransparency_x; ?>" name="slideelementtextbgndtransparency_x" value="">
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Thickness (px)', 'moments' ); ?></em>
                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextborderthickness_x" name="slideelementtextborderthickness_x" value="">
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Style', 'moments' ); ?></em>
                                            <select class="form-control qodef-input qodef-form-element" id="slideelementtextborderstyle_x" name="slideelementtextborderstyle_x">
                                                <option value=""></option>
                                                <option value="solid"><?php esc_html_e( 'solid', 'moments' ); ?></option>
                                                <option value="dashed"><?php esc_html_e( 'dashed', 'moments' ); ?></option>
                                                <option value="dotted"><?php esc_html_e( 'dotted', 'moments' ); ?></option>
                                                <option value="double"><?php esc_html_e( 'double', 'moments' ); ?></option>
                                                <option value="groove"><?php esc_html_e( 'groove', 'moments' ); ?></option>
                                                <option value="ridge"><?php esc_html_e( 'ridge', 'moments' ); ?></option>
                                                <option value="inset"><?php esc_html_e( 'inset', 'moments' ); ?></option>
                                                <option value="outset"><?php esc_html_e( 'outset', 'moments' ); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Color', 'moments' ); ?></em>
                                            <input type="text" id="slideelementtextbordercolor_x" name="slideelementtextbordercolor_x" value="" class="my-color-field"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="qodef-slide-element-type-fields qodef-setf-image" style="display: none">
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Image', 'moments' ); ?></em>
                                        <div class="qodef-media-uploader">
                                            <div style="display: none"
                                                    class="qodef-media-image-holder">
                                                <img src=""
                                                        class="qodef-media-image img-thumbnail"/>
                                            </div>
                                            <div style="display: none"
                                                    class="form-control qodef-input qodef-form-element qodef-media-meta-fields">
                                                <input type="hidden" class="qodef-media-upload-url"
                                                        id="slideelementimageurl_x"
                                                        name="slideelementimageurl_x"
                                                        value=""/>
                                                <input type="hidden" class="qodef-media-upload-height"
                                                        name="slideelementimageuploadheight_x"
                                                        value=""/>
                                                <input type="hidden"
                                                        class="qodef-media-upload-width"
                                                        name="slideelementimageuploadwidth_x"
                                                        value=""/>
                                            </div>
                                            <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                                                    href="javascript:void(0)"
                                                    data-frame-title="<?php esc_html_e( 'Select Image', 'moments' ); ?>"
                                                    data-frame-button-text="<?php esc_html_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
                                            <a style="display: none;" href="javascript: void(0)"
                                                    class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative width (F/C*100 or blank for auto width)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimagewidth_x" name="slideelementimagewidth_x" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative height (G/D*100 or blank for auto height)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimageheight_x" name="slideelementimageheight_x" value="">
                                    </div>
                                </div>
                                <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimageleft_x" name="slideelementimageleft_x" value="">
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimagetop_x" name="slideelementimagetop_x" value="">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Link', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimagelink_x" name="slideelementimagelink_x">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Target', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementimagetarget_x" name="slideelementimagetarget_x">
                                            <option value="_self"><?php esc_html_e( 'Self', 'moments' ); ?></option>
                                            <option value="_blank"><?php esc_html_e( 'Blank', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Border Thickness (px)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimageborderthickness_x" name="slideelementimageborderthickness_x" value="">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Border Style', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementimageborderstyle_x" name="slideelementimageborderstyle_x">
                                            <option value=""></option>
                                            <option value="solid"><?php esc_html_e( 'solid', 'moments' ); ?></option>
                                            <option value="dashed"><?php esc_html_e( 'dashed', 'moments' ); ?></option>
                                            <option value="dotted"><?php esc_html_e( 'dotted', 'moments' ); ?></option>
                                            <option value="double"><?php esc_html_e( 'double', 'moments' ); ?></option>
                                            <option value="groove"><?php esc_html_e( 'groove', 'moments' ); ?></option>
                                            <option value="ridge"><?php esc_html_e( 'ridge', 'moments' ); ?></option>
                                            <option value="inset"><?php esc_html_e( 'inset', 'moments' ); ?></option>
                                            <option value="outset"><?php esc_html_e( 'outset', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Border Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementimagebordercolor_x" name="slideelementimagebordercolor_x" value="" class="my-color-field"/>
                                    </div>
                                </div>
                            </div>

                            <div class="qodef-slide-element-type-fields qodef-setf-button" style="display: none">
                                <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttonleft_x" name="slideelementbuttonleft_x">
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttontop_x" name="slideelementbuttontop_x">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Button Text', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttontext_x" name="slideelementbuttontext_x">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Link', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttonlink_x" name="slideelementbuttonlink_x">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Target', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementbuttontarget_x" name="slideelementbuttontarget_x">
                                            <option value="_self"><?php esc_html_e( 'Self', 'moments' ); ?></option>
                                            <option value="_blank"><?php esc_html_e( 'Blank', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Button Size', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementbuttonsize_x" name="slideelementbuttonsize_x">
                                            <option value=""><?php esc_html_e( 'Default', 'moments' ); ?></option>
                                            <option value="small"><?php esc_html_e( 'Small', 'moments' ); ?></option>
                                            <option value="medium"><?php esc_html_e( 'Medium', 'moments' ); ?></option>
                                            <option value="large"><?php esc_html_e( 'Large', 'moments' ); ?></option>
                                            <option value="huge"><?php esc_html_e( 'Extra Large', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Button Type', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementbuttontype_x" name="slideelementbuttontype_x">
                                            <option value=""><?php esc_html_e( 'Default', 'moments' ); ?></option>
                                            <option value="outline"><?php esc_html_e( 'Outline', 'moments' ); ?></option>
                                            <option value="solid"><?php esc_html_e( 'Solid', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-all-but-custom"<?php if ( $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description">Keep in Line with Other Buttons?</em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementbuttoninline_x" name="slideelementbuttoninline_x">
                                            <option value="no"><?php esc_html_e( 'No', 'moments' ); ?></option>
                                            <option value="yes"><?php esc_html_e( 'Yes', 'moments' ); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Font Size (px)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttonfontsize_x" name="slideelementbuttonfontsize_x">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Font Weight (px)', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element" id="slideelementbuttonfontweight_x" name="slideelementbuttonfontweight_x">
                                            <option value=""></option>
											<?php for ( $i = 1; $i <= 9; $i ++ ) { ?>
                                                <option value="<?php echo esc_attr( $i * 100 ); ?>"><?php echo esc_html( $i * 100 ); ?></option>
											<?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Font Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementbuttonfontcolor_x" name="slideelementbuttonfontcolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Font Hover Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementbuttonfonthovercolor_x" name="slideelementbuttonfonthovercolor_x" class="my-color-field"/>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Background Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementbuttonbgndcolor_x" name="slideelementbuttonbgndcolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Background Hover Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementbuttonbgndhovercolor_x" name="slideelementbuttonbgndhovercolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Border Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementbuttonbordercolor_x" name="slideelementbuttonbordercolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Border Hover Color', 'moments' ); ?></em>
                                        <input type="text" id="slideelementbuttonborderhovercolor_x" name="slideelementbuttonborderhovercolor_x" class="my-color-field"/>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Icon Pack', 'moments' ); ?></em>
                                        <select class="form-control qodef-input qodef-form-element qodef-slide-element-button-icon-pack"
                                                id="slideelementbuttoniconpack_x"
                                                name="slideelementbuttoniconpack_x"
                                        >
											<?php
											$icon_packs = $moments_qodef_IconCollections->getIconCollectionsEmpty( "no_icon" );
											foreach ( $icon_packs as $key => $value ) { ?>
                                                <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
												<?php
											}
											?>
                                        </select>
                                    </div>
									<?php
									foreach ( $moments_qodef_IconCollections->iconCollections as $collection_key => $collection_object ) {
										$icons_array = $collection_object->getIconsArray();
										?>
                                        <div class="col-lg-3 qodef-slide-element-button-icon-collection <?php echo esc_attr( $collection_key ); ?>" style="display: none">
                                            <em class="qodef-field-description"><?php esc_html_e( 'Button Icon', 'moments' ); ?></em>
                                            <select class="form-control qodef-input qodef-form-element"
                                                    id="slideelementbuttonicon_<?php echo esc_attr( $collection_key ); ?>_x"
                                                    name="slideelementbuttonicon_<?php echo esc_attr( $collection_key ); ?>_x"
                                            >
												<?php
												foreach ( $icons_array as $key => $value ) { ?>
                                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
													<?php
												}
												?>
                                            </select>
                                        </div>
										<?php
									}
									?>
                                </div>
                            </div>

                            <div class="qodef-slide-element-type-fields qodef-setf-section-link" style="display: none">
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description">Target Section Anchor (i.e. "#products")</em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementsectionlinkanchor_x" name="slideelementsectionlinkanchor_x">
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="qodef-field-description">Anchor Link Text (i.e. "Scroll Down")</em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementsectionlinktext_x" name="slideelementsectionlinktext_x">
                                    </div>
                                </div>
                            </div>

                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Animation', 'moments' ); ?></em>
                                    <select class="form-control qodef-input qodef-form-element" id="slideelementanimation_x" name="slideelementanimation_x">
                                        <option value="default"><?php esc_html_e( 'Default', 'moments' ); ?></option>
                                        <option value="none"><?php esc_html_e( 'No Animation', 'moments' ); ?></option>
                                        <option value="flip"><?php esc_html_e( 'Flip', 'moments' ); ?></option>
                                        <option value="spin"><?php esc_html_e( 'Spin', 'moments' ); ?></option>
                                        <option value="fade"><?php esc_html_e( 'Fade In', 'moments' ); ?></option>
                                        <option value="from_bottom"><?php esc_html_e( 'Fly In From Bottom', 'moments' ); ?></option>
                                        <option value="from_top"><?php esc_html_e( 'Fly In From Top', 'moments' ); ?></option>
                                        <option value="from_left"><?php esc_html_e( 'Fly In From Left', 'moments' ); ?></option>
                                        <option value="from_right"><?php esc_html_e( 'Fly In From Right', 'moments' ); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( ' Animation Delay (i.e. "0.5s" or "400ms")', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementanimationdelay_x" name="slideelementanimationdelay_x">
                                </div>
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Animation Duration (i.e. "0.5s" or "400ms")', 'moments' ); ?></em>
                                    <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementanimationduration_x" name="slideelementanimationduration_x">
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="qodef-field-description"><?php esc_html_e( 'Element Responsiveness', 'moments' ); ?></em>
                                    <select class="form-control qodef-input qodef-form-element qodef-slide-element-responsiveness-selector" id="slideelementresponsive_x" name="slideelementresponsive_x">
                                        <option value="proportional"><?php esc_html_e( 'Preserve proportions', 'moments' ); ?></option>
                                        <option value="stages"><?php esc_html_e( 'Scale based on stage coefficients', 'moments' ); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="qodef-slide-responsive-scale-factors" style="display:none">
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Enter below the scale factors for each responsive stage, relative to the values above (or to the original size for images).', 'moments' ); ?>
                                            <br/>Scale factor of 1 leaves the element at the same size as for the default screen width of
                                            <span class="qodef-slide-dynamic-def-width"><?php echo esc_html( $default_screen_width ); ?></span>px, while setting it to zero hides the element.
                                            <div class="qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>><?php esc_html_e( 'If you also wish to change the position of the element for a certain stage, enter the desired position in the corresponding fields.', 'moments' ); ?></div>
                                        </em>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Mobile', 'moments' ); ?>
                                            <br><?php esc_html_e( '(up to ', 'moments' ); ?><?php echo esc_html( $screen_widths["mobile"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
                                        </em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscalemobile_x" name="slideelementscalemobile_x" placeholder="0.5">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementleftmobile_x" name="slideelementleftmobile_x">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtopmobile_x" name="slideelementtopmobile_x">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Tablet (Portrait)', 'moments' ); ?>
                                            <br>(<?php echo esc_html( $screen_widths["mobile"] + 1 ); ?><?php esc_html_e( 'px - ', 'moments' ); ?><?php echo esc_html( $screen_widths["tabletp"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
                                        </em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscaletabletp_x" name="slideelementscaletabletp_x" placeholder="0.6">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementlefttabletp_x" name="slideelementlefttabletp_x">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtoptabletp_x" name="slideelementtoptabletp_x">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Tablet (Landscape)', 'moments' ); ?>
                                            <br>(<?php echo esc_html( $screen_widths["tabletp"] + 1 ); ?><?php esc_html_e( 'px - ', 'moments' ); ?><?php echo esc_html( $screen_widths["tabletl"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
                                        </em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscaletabletl_x" name="slideelementscaletabletl_x" placeholder="0.7">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementlefttabletl_x" name="slideelementlefttabletl_x">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtoptabletl_x" name="slideelementtoptabletl_x">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Laptop', 'moments' ); ?>
                                            <br>(<?php echo esc_html( $screen_widths["tabletl"] + 1 ); ?><?php esc_html_e( 'px - ', 'moments' ); ?><?php echo esc_html( $screen_widths["laptop"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
                                        </em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscalelaptop_x" name="slideelementscalelaptop_x" placeholder="0.8">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementleftlaptop_x" name="slideelementleftlaptop_x">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtoplaptop_x" name="slideelementtoplaptop_x">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Desktop', 'moments' ); ?>
                                            <br><?php esc_html_e( '(above ', 'moments' ); ?><?php echo esc_html( $screen_widths["laptop"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
                                        </em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscaledesktop_x" name="slideelementscaledesktop_x" placeholder="1">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementleftdesktop_x" name="slideelementleftdesktop_x">
                                    </div>
                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
                                        <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtopdesktop_x" name="slideelementtopdesktop_x">
                                    </div>
                                </div>
                            </div>
                        </div><!-- close div.qodef-section-content -->
                    </div><!-- close div.container-fluid -->
                </div>
            </div>
        </div>
		<?php
		$no             = 1;
		$slide_elements = get_post_meta( $post->ID, 'qode_slide_elements', true );
		if ( !empty( $slide_elements) ) {
			if ( count( $slide_elements ) > 1 ) {
				//usort($slide_elements, "moments_qodef_compare_portfolio_options");
			}
			while ( isset( $slide_elements[ $no - 1 ] ) ) {
				$slide_element = $slide_elements[ $no - 1 ];
				?>
	            <div class="qodef-slide-element-additional-item" rel="<?php echo esc_attr( $no ); ?>">
	                <div class="qodef-slide-element-toggle-holder">
	                    <div class="qodef-slide-element-toggle qodef-toggle-desc">
	                        <span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Slide Element - ', 'moments' ); ?><em><?php echo esc_html( stripslashes( $slide_element['slideelementname'] ) ); ?></em></span>
	                    </div>
	                    <div class="qodef-slide-element-toggle qodef-slide-element-control">
	                        <span class="toggle-slide-element-item"><i class="fa fa-caret-down"></i></span>
	                        <a href="#" class="remove-slide-element-item"><i class="fa fa-times"></i></a>
	                    </div>
	                </div>
	                <div class="qodef-slide-element-toggle-content" style="display: none">
	                    <div class="qodef-page-form-section">
	                        <div class="qodef-section-content">
	                            <div class="container-fluid">
	                                <div class="row">
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Element Type', 'moments' ); ?></em>
	                                        <select class="form-control qodef-input qodef-form-element qodef-slide-element-type-selector" id="slideelementtype_<?php echo esc_attr( $no ); ?>" name="slideelementtype[]">
	                                            <option value="text" <?php echo esc_attr( $slide_element['slideelementtype'] ) == "text" ? "selected" : ""; ?>><?php esc_html_e( 'Text', 'moments' ); ?></option>
	                                            <option value="image" <?php echo esc_attr( $slide_element['slideelementtype'] ) == "image" ? "selected" : ""; ?>><?php esc_html_e( 'Image', 'moments' ); ?></option>
	                                            <option value="button" <?php echo esc_attr( $slide_element['slideelementtype'] ) == "button" ? "selected" : ""; ?>><?php esc_html_e( 'Button', 'moments' ); ?></option>
	                                            <option value="section-link" <?php echo esc_attr( $slide_element['slideelementtype'] ) == "section-link" ? "selected" : ""; ?>><?php esc_html_e( 'Anchor Link', 'moments' ); ?></option>
	                                        </select>
	                                    </div>
	                                    <div class="col-lg-9">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Element Name (For Your Own Reference)', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementname_<?php esc_attr( $no ); ?>" name="slideelementname[]" value="<?php echo esc_attr( $slide_element['slideelementname'] ); ?>">
	                                    </div>
	                                </div>
	                                <div class="row next-row qodef-slide-element-type-fields qodef-setf-section-link"<?php if ( $slide_element['slideelementtype'] != "section-link" ) { ?> style="display: none"<?php } ?>>
	                                    <div class="col-lg-12">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Anchor Link is always rendered at the bottom of the slide, centrally aligned.', 'moments' ); ?></em>
	                                    </div>
	                                </div>
	                                <div class="row next-row">
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description">Element Visible?</em>
	                                        <select class="form-control qodef-input qodef-form-element" id="slideelementvisible_<?php echo esc_attr( $no ); ?>" name="slideelementvisible[]">
	                                            <option value="yes" <?php if ( isset( $slide_element['slideelementvisible'] ) ) {
													echo esc_attr( $slide_element['slideelementvisible'] ) == "yes" ? "selected" : "";
												} ?>>Yes
	                                            </option>
	                                            <option value="no" <?php if ( isset( $slide_element['slideelementvisible'] ) ) {
													echo esc_attr( $slide_element['slideelementvisible'] ) == "no" ? "selected" : "";
												} ?>>No
	                                            </option>
	                                        </select>
	                                    </div>
	                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Pivot Point', 'moments' ); ?></em>
	                                        <select class="form-control qodef-input qodef-form-element" id="slideelementpivot_<?php echo esc_attr( $no ); ?>" name="slideelementpivot[]">
	                                            <option value="top-left" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "top-left" ? "selected" : "";
												} ?>>Top - Left
	                                            </option>
	                                            <option value="top-center" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "top-center" ? "selected" : "";
												} ?>>Top - Center
	                                            </option>
	                                            <option value="top-right" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "top-right" ? "selected" : "";
												} ?>>Top - Right
	                                            </option>
	                                            <option value="middle-left" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "middle-left" ? "selected" : "";
												} ?>>Middle - Left
	                                            </option>
	                                            <option value="middle-center" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "middle-center" ? "selected" : "";
												} ?>>Middle - Center
	                                            </option>
	                                            <option value="middle-right" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "middle-right" ? "selected" : "";
												} ?>>Middle - Right
	                                            </option>
	                                            <option value="bottom-left" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "bottom-left" ? "selected" : "";
												} ?>>Bottom - Left
	                                            </option>
	                                            <option value="bottom-center" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "bottom-center" ? "selected" : "";
												} ?>>Bottom - Center
	                                            </option>
	                                            <option value="bottom-right" <?php if ( isset( $slide_element['slideelementpivot'] ) ) {
													echo esc_attr( $slide_element['slideelementpivot'] ) == "bottom-right" ? "selected" : "";
												} ?>>Bottom - Right
	                                            </option>
	                                        </select>
	                                    </div>
	                                    <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Order', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementzindex_<?php esc_attr( $no ); ?>" name="slideelementzindex[]" value="<?php echo isset( $slide_element['slideelementzindex'] ) ? esc_attr( $slide_element['slideelementzindex'] ) : ''; ?>">
	                                    </div>
	                                </div>
	                                <div class="row next-row qodef-slide-element-all-but-custom"<?php if ( $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Margin - Top (px)', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmargintop_<?php esc_attr( $no ); ?>" name="slideelementmargintop[]" value="<?php echo isset( $slide_element['slideelementmargintop'] ) ? esc_attr( $slide_element['slideelementmargintop'] ) : ''; ?>">
	                                    </div>
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Margin - Bottom (px)', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmarginbottom_<?php esc_attr( $no ); ?>" name="slideelementmarginbottom[]" value="<?php echo isset( $slide_element['slideelementmarginbottom'] ) ? esc_attr( $slide_element['slideelementmarginbottom'] ) : ''; ?>">
	                                    </div>
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Margin - Left (px)', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmarginleft_<?php esc_attr( $no ); ?>" name="slideelementmarginleft[]" value="<?php echo isset( $slide_element['slideelementmarginleft'] ) ? esc_attr( $slide_element['slideelementmarginleft'] ) : ''; ?>">
	                                    </div>
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Margin - Right (px)', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementmarginright_<?php esc_attr( $no ); ?>" name="slideelementmarginright[]" value="<?php echo isset( $slide_element['slideelementmarginright'] ) ? esc_attr( $slide_element['slideelementmarginright'] ) : ''; ?>">
	                                    </div>
	                                </div>

	                                <div class="qodef-slide-element-type-fields qodef-setf-text"<?php if ( $slide_element['slideelementtype'] != "text" ) { ?> style="display: none"<?php } ?>>
	                                    <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative width (F/C*100 or blank for auto width)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextwidth_<?php esc_attr( $no ); ?>" name="slideelementtextwidth[]" value="<?php echo isset( $slide_element['slideelementtextwidth'] ) ? esc_attr( $slide_element['slideelementtextwidth'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative height (G/D*100 or blank for auto height)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextheight_<?php esc_attr( $no ); ?>" name="slideelementtextheight[]" value="<?php echo isset( $slide_element['slideelementtextheight'] ) ? esc_attr( $slide_element['slideelementtextheight'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextleft_<?php esc_attr( $no ); ?>" name="slideelementtextleft[]" value="<?php echo isset( $slide_element['slideelementtextleft'] ) ? esc_attr( $slide_element['slideelementtextleft'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtexttop_<?php esc_attr( $no ); ?>" name="slideelementtexttop[]" value="<?php echo isset( $slide_element['slideelementtexttop'] ) ? esc_attr( $slide_element['slideelementtexttop'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Item Text', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtext_<?php esc_attr( $no ); ?>" name="slideelementtext[]" value="<?php echo esc_attr( $slide_element['slideelementtext'] ); ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Link', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextlink_<?php echo esc_attr( $no ); ?>" name="slideelementtextlink[]" value="<?php echo isset( $slide_element['slideelementtextlink'] ) ? esc_attr( $slide_element['slideelementtextlink'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Target', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementtexttarget_<?php echo esc_attr( $no ); ?>" name="slideelementtexttarget[]">
	                                                <option value="_self" <?php if ( isset( $slide_element['slideelementtexttarget'] ) ) {
														echo esc_attr( $slide_element['slideelementtexttarget'] ) == "_self" ? "selected" : "";
													} ?>>Self
	                                                </option>
	                                                <option value="_blank" <?php if ( isset( $slide_element['slideelementtexttarget'] ) ) {
														echo esc_attr( $slide_element['slideelementtexttarget'] ) == "_blank" ? "selected" : "";
													} ?>>Blank
	                                                </option>
	                                            </select>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Hover Color for Link', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementtextlinkhovercolor_<?php esc_attr( $no ); ?>" name="slideelementtextlinkhovercolor[]" value="<?php echo isset( $slide_element['slideelementtextlinkhovercolor'] ) ? esc_attr( $slide_element['slideelementtextlinkhovercolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Text Style', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementtextstyle_<?php echo esc_attr( $no ); ?>" name="slideelementtextstyle[]">
	                                                <option value="small" <?php if ( isset( $slide_element['slideelementtextstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementtextstyle'] ) == "small" ? "selected" : "";
													} ?>>Small Text
	                                                </option>
	                                                <option value="normal" <?php if ( isset( $slide_element['slideelementtextstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementtextstyle'] ) == "normal" ? "selected" : "";
													} ?>>Normal Text
	                                                </option>
	                                                <option value="large" <?php if ( isset( $slide_element['slideelementtextstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementtextstyle'] ) == "large" ? "selected" : "";
													} ?>>Large Text
	                                                </option>
	                                                <option value="extra-large" <?php if ( isset( $slide_element['slideelementtextstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementtextstyle'] ) == "extra-large" ? "selected" : "";
													} ?>>Extra Large Text
	                                                </option>
	                                            </select>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Text Style Options', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element qodef-slide-element-options-selector qodef-slide-element-options-selector-text" id="slideelementtextoptions_<?php echo esc_attr( $no ); ?>" name="slideelementtextoptions[]">
	                                                <option value="simple" <?php if ( isset( $slide_element['slideelementtextoptions'] ) ) {
														echo esc_attr( $slide_element['slideelementtextoptions'] ) == "simple" ? "selected" : "";
													} ?>>Simple
	                                                </option>
	                                                <option value="advanced" <?php if ( isset( $slide_element['slideelementtextoptions'] ) ) {
														echo esc_attr( $slide_element['slideelementtextoptions'] ) == "advanced" ? "selected" : "";
													} ?>>Advanced
	                                                </option>
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="qodef-slide-elements-advanced-text-options"<?php if ( isset( $slide_element['slideelementtextoptions'] ) && $slide_element['slideelementtextoptions'] != "advanced" ) { ?> style="display: none"<?php } ?>>
	                                        <div class="row next-row">
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Font Color', 'moments' ); ?></em>
	                                                <input type="text" id="slideelementfontcolor_<?php esc_attr( $no ); ?>" name="slideelementfontcolor[]" value="<?php echo esc_attr( $slide_element['slideelementfontcolor'] ); ?>" class="my-color-field"/>
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Font Size (px)', 'moments' ); ?></em>
	                                                <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementfontsize_<?php esc_attr( $no ); ?>" name="slideelementfontsize[]" value="<?php echo esc_attr( $slide_element['slideelementfontsize'] ); ?>">
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Line Height (px)', 'moments' ); ?></em>
	                                                <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementlineheight_<?php esc_attr( $no ); ?>" name="slideelementlineheight[]" value="<?php echo esc_attr( $slide_element['slideelementlineheight'] ); ?>">
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Letter Spacing (px)', 'moments' ); ?></em>
	                                                <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementletterspacing_<?php esc_attr( $no ); ?>" name="slideelementletterspacing[]" value="<?php echo esc_attr( $slide_element['slideelementletterspacing'] ); ?>">
	                                            </div>
	                                        </div>
	                                        <div class="row next-row">
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Font Family', 'moments' ); ?></em>
	                                                <select class="form-control qodef-input qodef-form-element"
	                                                        id="slideelementfontfamily_<?php echo esc_attr( $no ); ?>"
	                                                        name="slideelementfontfamily[]"
	                                                >
	                                                    <option value="-1"><?php esc_html_e( 'Default', 'moments' ); ?></option>
														<?php foreach ( $moments_qodef_fonts_array as $fontArray ) { ?>
	                                                        <option <?php if ( isset( $slide_element['slideelementfontfamily'] ) && $slide_element['slideelementfontfamily'] == str_replace( ' ', '+', $fontArray["family"] ) ) {
																echo "selected='selected'";
															} ?> value="<?php echo esc_attr( str_replace( ' ', '+', $fontArray["family"] ) ); ?>"><?php echo esc_html( $fontArray["family"] ); ?></option>
														<?php } ?>
	                                                </select>
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Font Style', 'moments' ); ?></em>
	                                                <select class="form-control qodef-input qodef-form-element" id="slideelementfontstyle_<?php echo esc_attr( $no ); ?>" name="slideelementfontstyle[]">
	                                                    <option value="" <?php if ( isset( $slide_element['slideelementfontstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementfontstyle'] ) == "" ? "selected" : "";
														} ?>></option>
	                                                    <option value="normal" <?php if ( isset( $slide_element['slideelementfontstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementfontstyle'] ) == "normal" ? "selected" : "";
														} ?>>normal
	                                                    </option>
	                                                    <option value="italic" <?php if ( isset( $slide_element['slideelementfontstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementfontstyle'] ) == "italic" ? "selected" : "";
														} ?>>italic
	                                                    </option>
	                                                </select>
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Font Weight', 'moments' ); ?></em>
	                                                <select class="form-control qodef-input qodef-form-element" id="slideelementfontweight_<?php echo esc_attr( $no ); ?>" name="slideelementfontweight[]">
	                                                    <option value="" <?php if ( isset( $slide_element['slideelementfontweight'] ) ) {
															echo esc_attr( $slide_element['slideelementfontweight'] ) == "" ? "selected" : "";
														} ?>></option>
														<?php for ( $i = 1; $i <= 9; $i ++ ) { ?>
	                                                        <option value="<?php echo esc_attr( $i * 100 ); ?>" <?php if ( isset( $slide_element['slideelementfontweight'] ) ) {
																echo (int) $slide_element['slideelementfontweight'] == $i * 100 ? "selected" : "";
															} ?>><?php echo esc_html( $i * 100 ); ?></option>
														<?php } ?>
	                                                </select>
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Text Transform', 'moments' ); ?></em>
	                                                <select class="form-control qodef-input qodef-form-element" id="slideelementtexttransform_<?php echo esc_attr( $no ); ?>" name="slideelementtexttransform[]">
	                                                    <option value="" <?php if ( isset( $slide_element['slideelementtexttransform'] ) ) {
															echo esc_attr( $slide_element['slideelementtexttransform'] ) == "" ? "selected" : "";
														} ?>></option>
	                                                    <option value="none" <?php if ( isset( $slide_element['slideelementtexttransform'] ) ) {
															echo esc_attr( $slide_element['slideelementtexttransform'] ) == "none" ? "selected" : "";
														} ?>>None
	                                                    </option>
	                                                    <option value="capitalize" <?php if ( isset( $slide_element['slideelementtexttransform'] ) ) {
															echo esc_attr( $slide_element['slideelementtexttransform'] ) == "capitalize" ? "selected" : "";
														} ?>>Capitalize
	                                                    </option>
	                                                    <option value="uppercase" <?php if ( isset( $slide_element['slideelementtexttransform'] ) ) {
															echo esc_attr( $slide_element['slideelementtexttransform'] ) == "uppercase" ? "selected" : "";
														} ?>>Uppercase
	                                                    </option>
	                                                    <option value="lowercase" <?php if ( isset( $slide_element['slideelementtexttransform'] ) ) {
															echo esc_attr( $slide_element['slideelementtexttransform'] ) == "lowercase" ? "selected" : "";
														} ?>>Lowercase
	                                                    </option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="row next-row">
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Background Color', 'moments' ); ?></em>
	                                                <input type="text" id="slideelementtextbgndcolor_<?php esc_attr( $no ); ?>" name="slideelementtextbgndcolor[]" value="<?php echo isset( $slide_element['slideelementtextbgndcolor'] ) ? esc_attr( $slide_element['slideelementtextbgndcolor'] ) : ''; ?>" class="my-color-field"/>
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Background Transparency (0-1)', 'moments' ); ?></em>
	                                                <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextbgndtransparency_<?php esc_attr( $no ); ?>" name="slideelementtextbgndtransparency[]" value="<?php echo isset( $slide_element['slideelementtextbgndtransparency'] ) ? esc_attr( $slide_element['slideelementtextbgndtransparency'] ) : ''; ?>">
	                                            </div>
	                                        </div>
	                                        <div class="row next-row">
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Border Thickness (px)', 'moments' ); ?></em>
	                                                <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtextborderthickness_<?php esc_attr( $no ); ?>" name="slideelementtextborderthickness[]" value="<?php echo isset( $slide_element['slideelementtextborderthickness'] ) ? esc_attr( $slide_element['slideelementtextborderthickness'] ) : ''; ?>">
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Border Style', 'moments' ); ?></em>
	                                                <select class="form-control qodef-input qodef-form-element" id="slideelementtextborderstyle_<?php echo esc_attr( $no ); ?>" name="slideelementtextborderstyle[]">
	                                                    <option value="" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "" ? "selected" : "";
														} ?>></option>
	                                                    <option value="solid" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "solid" ? "selected" : "";
														} ?>>solid
	                                                    </option>
	                                                    <option value="dashed" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "dashed" ? "selected" : "";
														} ?>>dashed
	                                                    </option>
	                                                    <option value="dotted" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "dotted" ? "selected" : "";
														} ?>>dotted
	                                                    </option>
	                                                    <option value="double" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "double" ? "selected" : "";
														} ?>>double
	                                                    </option>
	                                                    <option value="groove" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "groove" ? "selected" : "";
														} ?>>groove
	                                                    </option>
	                                                    <option value="ridge" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "ridge" ? "selected" : "";
														} ?>>ridge
	                                                    </option>
	                                                    <option value="inset" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "inset" ? "selected" : "";
														} ?>>inset
	                                                    </option>
	                                                    <option value="outset" <?php if ( isset( $slide_element['slideelementtextborderstyle'] ) ) {
															echo esc_attr( $slide_element['slideelementtextborderstyle'] ) == "outset" ? "selected" : "";
														} ?>>outset
	                                                    </option>
	                                                </select>
	                                            </div>
	                                            <div class="col-lg-3">
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Border Color', 'moments' ); ?></em>
	                                                <input type="text" id="slideelementtextbordercolor_<?php esc_attr( $no ); ?>" name="slideelementtextbordercolor[]" value="<?php echo isset( $slide_element['slideelementtextbordercolor'] ) ? esc_attr( $slide_element['slideelementtextbordercolor'] ) : ''; ?>" class="my-color-field"/>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="qodef-slide-element-type-fields qodef-setf-image"<?php if ( $slide_element['slideelementtype'] != "image" ) { ?> style="display: none"<?php } ?>>
	                                    <div class="row next-row">
	                                        <div class="col-lg-12">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Image', 'moments' ); ?></em>
	                                            <div class="qodef-media-uploader">
	                                                <div<?php if ( $slide_element['slideelementimageurl'] == "" ) { ?> style="display: none"<?php } ?>
	                                                        class="qodef-media-image-holder">
	                                                    <img src="<?php if ( $slide_element['slideelementimageurl'] != "" ) {
															echo esc_url( moments_qodef_get_attachment_thumb_url( $slide_element['slideelementimageurl'] ) );
														} ?>"
	                                                            class="qodef-media-image img-thumbnail"/>
	                                                </div>
	                                                <div style="display: none"
	                                                        class="form-control qodef-input qodef-form-element qodef-media-meta-fields">
	                                                    <input type="hidden" class="qodef-media-upload-url"
	                                                            id="slideelementimageurl_<?php esc_attr( $no ); ?>"
	                                                            name="slideelementimageurl[]"
	                                                            value="<?php echo esc_attr( $slide_element['slideelementimageurl'] ); ?>"/>
	                                                    <input type="hidden" class="qodef-media-upload-height"
	                                                            name="slideelementimageuploadheight[]"
	                                                            value="<?php echo esc_attr( $slide_element['slideelementimageuploadheight'] ); ?>"/>
	                                                    <input type="hidden"
	                                                            class="qodef-media-upload-width"
	                                                            name="slideelementimageuploadwidth[]"
	                                                            value="<?php echo esc_attr( $slide_element['slideelementimageuploadwidth'] ); ?>"/>
	                                                </div>
	                                                <a class="qodef-media-upload-btn btn btn-sm btn-primary"
	                                                        href="javascript:void(0)"
	                                                        data-frame-title="<?php esc_html_e( 'Select Image', 'moments' ); ?>"
	                                                        data-frame-button-text="<?php esc_html_e( 'Select Image', 'moments' ); ?>"><?php esc_html_e( 'Upload', 'moments' ); ?></a>
	                                                <a style="display: none;" href="javascript: void(0)"
	                                                        class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'moments' ); ?></a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative width (F/C*100 or blank for auto width)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimagewidth_<?php esc_attr( $no ); ?>" name="slideelementimagewidth[]" value="<?php echo isset( $slide_element['slideelementimagewidth'] ) ? esc_attr( $slide_element['slideelementimagewidth'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative height (G/D*100 or blank for auto height)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimageheight_<?php esc_attr( $no ); ?>" name="slideelementimageheight[]" value="<?php echo isset( $slide_element['slideelementimageheight'] ) ? esc_attr( $slide_element['slideelementimageheight'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimageleft_<?php esc_attr( $no ); ?>" name="slideelementimageleft[]" value="<?php echo isset( $slide_element['slideelementimageleft'] ) ? esc_attr( $slide_element['slideelementimageleft'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimagetop_<?php esc_attr( $no ); ?>" name="slideelementimagetop[]" value="<?php echo isset( $slide_element['slideelementimagetop'] ) ? esc_attr( $slide_element['slideelementimagetop'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Link', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimagelink_<?php echo esc_attr( $no ); ?>" name="slideelementimagelink[]" value="<?php echo isset( $slide_element['slideelementimagelink'] ) ? esc_attr( $slide_element['slideelementimagelink'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Target', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementimagetarget_<?php echo esc_attr( $no ); ?>" name="slideelementimagetarget[]">
	                                                <option value="_self" <?php if ( isset( $slide_element['slideelementimagetarget'] ) ) {
														echo esc_attr( $slide_element['slideelementimagetarget'] ) == "_self" ? "selected" : "";
													} ?>>Self
	                                                </option>
	                                                <option value="_blank" <?php if ( isset( $slide_element['slideelementimagetarget'] ) ) {
														echo esc_attr( $slide_element['slideelementimagetarget'] ) == "_blank" ? "selected" : "";
													} ?>>Blank
	                                                </option>
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Thickness (px)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementimageborderthickness_<?php esc_attr( $no ); ?>" name="slideelementimageborderthickness[]" value="<?php echo isset( $slide_element['slideelementimageborderthickness'] ) ? esc_attr( $slide_element['slideelementimageborderthickness'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Style', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementimageborderstyle_<?php echo esc_attr( $no ); ?>" name="slideelementimageborderstyle[]">
	                                                <option value="" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "" ? "selected" : "";
													} ?>></option>
	                                                <option value="solid" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "solid" ? "selected" : "";
													} ?>>solid
	                                                </option>
	                                                <option value="dashed" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "dashed" ? "selected" : "";
													} ?>>dashed
	                                                </option>
	                                                <option value="dotted" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "dotted" ? "selected" : "";
													} ?>>dotted
	                                                </option>
	                                                <option value="double" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "double" ? "selected" : "";
													} ?>>double
	                                                </option>
	                                                <option value="groove" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "groove" ? "selected" : "";
													} ?>>groove
	                                                </option>
	                                                <option value="ridge" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "ridge" ? "selected" : "";
													} ?>>ridge
	                                                </option>
	                                                <option value="inset" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "inset" ? "selected" : "";
													} ?>>inset
	                                                </option>
	                                                <option value="outset" <?php if ( isset( $slide_element['slideelementimageborderstyle'] ) ) {
														echo esc_attr( $slide_element['slideelementimageborderstyle'] ) == "outset" ? "selected" : "";
													} ?>>outset
	                                                </option>
	                                            </select>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementimagebordercolor_<?php esc_attr( $no ); ?>" name="slideelementimagebordercolor[]" value="<?php echo isset( $slide_element['slideelementimagebordercolor'] ) ? esc_attr( $slide_element['slideelementimagebordercolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="qodef-slide-element-type-fields qodef-setf-button"<?php if ( $slide_element['slideelementtype'] != "button" ) { ?> style="display: none"<?php } ?>>
	                                    <div class="row next-row qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttonleft_<?php esc_attr( $no ); ?>" name="slideelementbuttonleft[]" value="<?php echo isset( $slide_element['slideelementbuttonleft'] ) ? esc_attr( $slide_element['slideelementbuttonleft'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-6">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttontop_<?php esc_attr( $no ); ?>" name="slideelementbuttontop[]" value="<?php echo isset( $slide_element['slideelementbuttontop'] ) ? esc_attr( $slide_element['slideelementbuttontop'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Button Text', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttontext_<?php echo esc_attr( $no ); ?>" name="slideelementbuttontext[]" value="<?php echo isset( $slide_element['slideelementbuttontext'] ) ? esc_attr( $slide_element['slideelementbuttontext'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Link', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttonlink_<?php echo esc_attr( $no ); ?>" name="slideelementbuttonlink[]" value="<?php echo isset( $slide_element['slideelementbuttonlink'] ) ? esc_attr( $slide_element['slideelementbuttonlink'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Target', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementbuttontarget_<?php echo esc_attr( $no ); ?>" name="slideelementbuttontarget[]">
	                                                <option value="_self" <?php if ( isset( $slide_element['slideelementbuttontarget'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttontarget'] ) == "_self" ? "selected" : "";
													} ?>>Self
	                                                </option>
	                                                <option value="_blank" <?php if ( isset( $slide_element['slideelementbuttontarget'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttontarget'] ) == "_blank" ? "selected" : "";
													} ?>>Blank
	                                                </option>
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Button Size', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementbuttonsize_<?php echo esc_attr( $no ); ?>" name="slideelementbuttonsize[]">
	                                                <option value="" <?php if ( isset( $slide_element['slideelementbuttonsize'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttonsize'] ) == "" ? "selected" : "";
													} ?>>Default
	                                                </option>
	                                                <option value="small" <?php if ( isset( $slide_element['slideelementbuttonsize'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttonsize'] ) == "small" ? "selected" : "";
													} ?>>Small
	                                                </option>
	                                                <option value="medium" <?php if ( isset( $slide_element['slideelementbuttonsize'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttonsize'] ) == "medium" ? "selected" : "";
													} ?>>Medium
	                                                </option>
	                                                <option value="large" <?php if ( isset( $slide_element['slideelementbuttonsize'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttonsize'] ) == "large" ? "selected" : "";
													} ?>>Large
	                                                </option>
	                                                <option value="huge" <?php if ( isset( $slide_element['slideelementbuttonsize'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttonsize'] ) == "huge" ? "selected" : "";
													} ?>>Extra Large
	                                                </option>
	                                            </select>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Button Type', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementbuttontype_<?php echo esc_attr( $no ); ?>" name="slideelementbuttontype[]">
	                                                <option value="" <?php if ( isset( $slide_element['slideelementbuttontype'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttontype'] ) == "" ? "selected" : "";
													} ?>>Default
	                                                </option>
	                                                <option value="outline" <?php if ( isset( $slide_element['slideelementbuttontype'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttontype'] ) == "outline" ? "selected" : "";
													} ?>>Outline
	                                                </option>
	                                                <option value="solid" <?php if ( isset( $slide_element['slideelementbuttontype'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttontype'] ) == "solid" ? "selected" : "";
													} ?>>Solid
	                                                </option>
	                                            </select>
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-all-but-custom"<?php if ( $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description">Keep in Line with Other Buttons?</em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementbuttoninline_<?php echo esc_attr( $no ); ?>" name="slideelementbuttoninline[]">
	                                                <option value="no" <?php if ( isset( $slide_element['slideelementbuttoninline'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttoninline'] ) == "no" ? "selected" : "";
													} ?>>No
	                                                </option>
	                                                <option value="yes" <?php if ( isset( $slide_element['slideelementbuttoninline'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttoninline'] ) == "yes" ? "selected" : "";
													} ?>>Yes
	                                                </option>
	                                            </select>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Size (px)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementbuttonfontsize_<?php echo esc_attr( $no ); ?>" name="slideelementbuttonfontsize[]" value="<?php echo isset( $slide_element['slideelementbuttonfontsize'] ) ? esc_attr( $slide_element['slideelementbuttonfontsize'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Weight (px)', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element" id="slideelementbuttonfontweight_<?php echo esc_attr( $no ); ?>" name="slideelementbuttonfontweight[]">
	                                                <option value="" <?php if ( isset( $slide_element['slideelementbuttonfontweight'] ) ) {
														echo esc_attr( $slide_element['slideelementbuttonfontweight'] ) == "" ? "selected" : "";
													} ?>></option>
													<?php for ( $i = 1; $i <= 9; $i ++ ) { ?>
	                                                    <option value="<?php echo esc_attr( $i * 100 ); ?>" <?php if ( isset( $slide_element['slideelementbuttonfontweight'] ) ) {
															echo (int) $slide_element['slideelementbuttonfontweight'] == $i * 100 ? "selected" : "";
														} ?>><?php echo esc_html( $i * 100 ); ?></option>
													<?php } ?>
	                                            </select>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementbuttonfontcolor_<?php esc_attr( $no ); ?>" name="slideelementbuttonfontcolor[]" value="<?php echo isset( $slide_element['slideelementbuttonfontcolor'] ) ? esc_attr( $slide_element['slideelementbuttonfontcolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Font Hover Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementbuttonfonthovercolor_<?php esc_attr( $no ); ?>" name="slideelementbuttonfonthovercolor[]" value="<?php echo isset( $slide_element['slideelementbuttonfonthovercolor'] ) ? esc_attr( $slide_element['slideelementbuttonfonthovercolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Background Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementbuttonbgndcolor_<?php esc_attr( $no ); ?>" name="slideelementbuttonbgndcolor[]" value="<?php echo isset( $slide_element['slideelementbuttonbgndcolor'] ) ? esc_attr( $slide_element['slideelementbuttonbgndcolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Background Hover Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementbuttonbgndhovercolor_<?php esc_attr( $no ); ?>" name="slideelementbuttonbgndhovercolor[]" value="<?php echo isset( $slide_element['slideelementbuttonbgndhovercolor'] ) ? esc_attr( $slide_element['slideelementbuttonbgndhovercolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementbuttonbordercolor_<?php esc_attr( $no ); ?>" name="slideelementbuttonbordercolor[]" value="<?php echo isset( $slide_element['slideelementbuttonbordercolor'] ) ? esc_attr( $slide_element['slideelementbuttonbordercolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Border Hover Color', 'moments' ); ?></em>
	                                            <input type="text" id="slideelementbuttonborderhovercolor_<?php esc_attr( $no ); ?>" name="slideelementbuttonborderhovercolor[]" value="<?php echo isset( $slide_element['slideelementbuttonborderhovercolor'] ) ? esc_attr( $slide_element['slideelementbuttonborderhovercolor'] ) : ''; ?>" class="my-color-field"/>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Icon Pack', 'moments' ); ?></em>
	                                            <select class="form-control qodef-input qodef-form-element qodef-slide-element-button-icon-pack"
	                                                    id="slideelementbuttoniconpack_<?php echo esc_attr( $no ); ?>"
	                                                    name="slideelementbuttoniconpack[]"
	                                            >
													<?php
													$icon_packs = $moments_qodef_IconCollections->getIconCollectionsEmpty( "no_icon" );
													foreach ( $icon_packs as $key => $value ) { ?>
	                                                    <option <?php if ( isset( $slide_element['slideelementbuttoniconpack'] ) && $slide_element['slideelementbuttoniconpack'] == $key ) {
															echo "selected='selected'";
														} ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
														<?php
													}
													?>
	                                            </select>
	                                        </div>
											<?php
											foreach ( $moments_qodef_IconCollections->iconCollections as $collection_key => $collection_object ) {
												$icons_array = $collection_object->getIconsArray();
												?>
	                                            <div class="col-lg-3 qodef-slide-element-button-icon-collection <?php echo esc_attr( $collection_key ); ?>"<?php if ( ! isset( $slide_element['slideelementbuttoniconpack'] ) || $slide_element['slideelementbuttoniconpack'] != $collection_key ) { ?> style="display: none"<?php } ?>>
	                                                <em class="qodef-field-description"><?php esc_html_e( 'Button Icon', 'moments' ); ?></em>
	                                                <select class="form-control qodef-input qodef-form-element"
	                                                        id="slideelementbuttonicon_<?php echo esc_attr( $collection_key ) . '_' . esc_attr( $no ); ?>"
	                                                        name="slideelementbuttonicon_<?php echo esc_attr( $collection_key ); ?>[]"
	                                                >
														<?php
														foreach ( $icons_array as $key => $value ) { ?>
	                                                        <option <?php if ( isset( $slide_element[ 'slideelementbuttonicon_' . $collection_key ] ) && $slide_element[ 'slideelementbuttonicon_' . $collection_key ] == $key ) {
																echo "selected='selected'";
															} ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
															<?php
														}
														?>
	                                                </select>
	                                            </div>
												<?php
											}
											?>
	                                    </div>
	                                </div>

	                                <div class="qodef-slide-element-type-fields qodef-setf-section-link"<?php if ( $slide_element['slideelementtype'] != "section-link" ) { ?> style="display: none"<?php } ?>>
	                                    <div class="row next-row">
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description">Target Section Anchor (i.e. "#products")</em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementsectionlinkanchor_<?php esc_attr( $no ); ?>" name="slideelementsectionlinkanchor[]" value="<?php echo isset( $slide_element['slideelementsectionlinkanchor'] ) ? esc_attr( $slide_element['slideelementsectionlinkanchor'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3">
	                                            <em class="qodef-field-description">Anchor Link Text (i.e. "Scroll Down")</em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementsectionlinktext_<?php esc_attr( $no ); ?>" name="slideelementsectionlinktext[]" value="<?php echo isset( $slide_element['slideelementsectionlinktext'] ) ? esc_attr( $slide_element['slideelementsectionlinktext'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="row next-row">
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Animation', 'moments' ); ?></em>
	                                        <select class="form-control qodef-input qodef-form-element" id="slideelementanimation_<?php echo esc_attr( $no ); ?>" name="slideelementanimation[]">
	                                            <option value="default" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "default" ? "selected" : "";
												} ?>>Default
	                                            </option>
	                                            <option value="none" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "none" ? "selected" : "";
												} ?>>No Animation
	                                            </option>
	                                            <option value="flip" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "flip" ? "selected" : "";
												} ?>>Flip
	                                            </option>
	                                            <option value="Spin" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "Spin" ? "selected" : "";
												} ?>>Spin
	                                            </option>
	                                            <option value="fade" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "fade" ? "selected" : "";
												} ?>>Fade In
	                                            </option>
	                                            <option value="from_bottom" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "from_bottom" ? "selected" : "";
												} ?>>Fly In From Bottom
	                                            </option>
	                                            <option value="from_top" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "from_top" ? "selected" : "";
												} ?>>Fly In From Top
	                                            </option>
	                                            <option value="from_left" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "from_left" ? "selected" : "";
												} ?>>Fly In From Left
	                                            </option>
	                                            <option value="from_right" <?php if ( isset( $slide_element['slideelementanimation'] ) ) {
													echo esc_attr( $slide_element['slideelementanimation'] ) == "from_right" ? "selected" : "";
												} ?>>Fly In From Right
	                                            </option>
	                                        </select>
	                                    </div>
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( ' Animation Delay (i.e. "0.5s" or "400ms")', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementanimationdelay_<?php esc_attr( $no ); ?>" name="slideelementanimationdelay[]" value="<?php echo isset( $slide_element['slideelementanimationdelay'] ) ? esc_attr( $slide_element['slideelementanimationdelay'] ) : ''; ?>">
	                                    </div>
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Animation Duration (i.e. "0.5s" or "400ms")', 'moments' ); ?></em>
	                                        <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementanimationduration_<?php esc_attr( $no ); ?>" name="slideelementanimationduration[]" value="<?php echo isset( $slide_element['slideelementanimationduration'] ) ? esc_attr( $slide_element['slideelementanimationduration'] ) : ''; ?>">
	                                    </div>
	                                </div>
	                                <div class="row next-row">
	                                    <div class="col-lg-3">
	                                        <em class="qodef-field-description"><?php esc_html_e( 'Element Responsiveness', 'moments' ); ?></em>
	                                        <select class="form-control qodef-input qodef-form-element qodef-slide-element-responsiveness-selector" id="slideelementresponsive_<?php echo esc_attr( $no ); ?>" name="slideelementresponsive[]">
	                                            <option value="proportional" <?php if ( isset( $slide_element['slideelementresponsive'] ) ) {
													echo esc_attr( $slide_element['slideelementresponsive'] ) == "proportional" ? "selected" : "";
												} ?>>Preserve proportions
	                                            </option>
	                                            <option value="stages" <?php if ( isset( $slide_element['slideelementresponsive'] ) ) {
													echo esc_attr( $slide_element['slideelementresponsive'] ) == "stages" ? "selected" : "";
												} ?>>Scale based on stage coefficients
	                                            </option>
	                                        </select>
	                                    </div>
	                                </div>
	                                <div class="qodef-slide-responsive-scale-factors"<?php if ( isset( $slide_element['slideelementresponsive'] ) && $slide_element['slideelementresponsive'] == 'proportional' ) { ?> style="display:none"<?php } ?>>
	                                    <div class="row next-row">
	                                        <div class="col-lg-12">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Enter below the scale factors for each responsive stage, relative to the values above (or to the original size for images).', 'moments' ); ?>
	                                                <br/>Scale factor of 1 leaves the element at the same size as for the default screen width of
	                                                <span class="qodef-slide-dynamic-def-width"><?php echo esc_html( $default_screen_width ); ?></span>px, while setting it to zero hides the element.
	                                                <div class="qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>><?php esc_html_e( 'If you also wish to change the position of the element for a certain stage, enter the desired position in the corresponding fields.', 'moments' ); ?></div>
	                                            </em>
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Mobile', 'moments' ); ?>
	                                                <br><?php esc_html_e( '(up to ', 'moments' ); ?><?php echo esc_html( $screen_widths["mobile"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
	                                            </em>
	                                        </div>
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscalemobile_<?php esc_attr( $no ); ?>" name="slideelementscalemobile[]" value="<?php echo isset( $slide_element['slideelementscalemobile'] ) ? esc_attr( $slide_element['slideelementscalemobile'] ) : ''; ?>" placeholder="0.5">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementleftmobile_<?php esc_attr( $no ); ?>" name="slideelementleftmobile[]" value="<?php echo isset( $slide_element['slideelementleftmobile'] ) ? esc_attr( $slide_element['slideelementleftmobile'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtopmobile_<?php esc_attr( $no ); ?>" name="slideelementtopmobile[]" value="<?php echo isset( $slide_element['slideelementtopmobile'] ) ? esc_attr( $slide_element['slideelementtopmobile'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Tablet (Portrait)', 'moments' ); ?>
	                                                <br>(<?php echo esc_html( $screen_widths["mobile"] + 1 ); ?><?php esc_html_e( 'px - ', 'moments' ); ?><?php echo esc_html( $screen_widths["tabletp"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
	                                            </em>
	                                        </div>
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscaletabletp_<?php esc_attr( $no ); ?>" name="slideelementscaletabletp[]" value="<?php echo isset( $slide_element['slideelementscaletabletp'] ) ? esc_attr( $slide_element['slideelementscaletabletp'] ) : ''; ?>" placeholder="0.6">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementlefttabletp_<?php esc_attr( $no ); ?>" name="slideelementlefttabletp[]" value="<?php echo isset( $slide_element['slideelementlefttabletp'] ) ? esc_attr( $slide_element['slideelementlefttabletp'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtoptabletp_<?php esc_attr( $no ); ?>" name="slideelementtoptabletp[]" value="<?php echo isset( $slide_element['slideelementtoptabletp'] ) ? esc_attr( $slide_element['slideelementtoptabletp'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Tablet (Landscape)', 'moments' ); ?>
	                                                <br>(<?php echo esc_html( $screen_widths["tabletp"] + 1 ); ?><?php esc_html_e( 'px - ', 'moments' ); ?><?php echo esc_html( $screen_widths["tabletl"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
	                                            </em>
	                                        </div>
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscaletabletl_<?php esc_attr( $no ); ?>" name="slideelementscaletabletl[]" value="<?php echo isset( $slide_element['slideelementscaletabletl'] ) ? esc_attr( $slide_element['slideelementscaletabletl'] ) : ''; ?>" placeholder="0.7">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementlefttabletl_<?php esc_attr( $no ); ?>" name="slideelementlefttabletl[]" value="<?php echo isset( $slide_element['slideelementlefttabletl'] ) ? esc_attr( $slide_element['slideelementlefttabletl'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtoptabletl_<?php esc_attr( $no ); ?>" name="slideelementtoptabletl[]" value="<?php echo isset( $slide_element['slideelementtoptabletl'] ) ? esc_attr( $slide_element['slideelementtoptabletl'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Laptop', 'moments' ); ?>
	                                                <br>(<?php echo esc_html( $screen_widths["tabletl"] + 1 ); ?><?php esc_html_e( 'px - ', 'moments' ); ?><?php echo esc_html( $screen_widths["laptop"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
	                                            </em>
	                                        </div>
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscalelaptop_<?php esc_attr( $no ); ?>" name="slideelementscalelaptop[]" value="<?php echo isset( $slide_element['slideelementscalelaptop'] ) ? esc_attr( $slide_element['slideelementscalelaptop'] ) : ''; ?>" placeholder="0.8">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementleftlaptop_<?php esc_attr( $no ); ?>" name="slideelementleftlaptop[]" value="<?php echo isset( $slide_element['slideelementleftlaptop'] ) ? esc_attr( $slide_element['slideelementleftlaptop'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtoplaptop_<?php esc_attr( $no ); ?>" name="slideelementtoplaptop[]" value="<?php echo isset( $slide_element['slideelementtoplaptop'] ) ? esc_attr( $slide_element['slideelementtoplaptop'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="row next-row">
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Desktop', 'moments' ); ?>
	                                                <br><?php esc_html_e( '(above ', 'moments' ); ?><?php echo esc_html( $screen_widths["laptop"] ); ?><?php esc_html_e( 'px)', 'moments' ); ?>
	                                            </em>
	                                        </div>
	                                        <div class="col-lg-2">
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Scale Factor', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementscaledesktop_<?php esc_attr( $no ); ?>" name="slideelementscaledesktop[]" value="<?php echo isset( $slide_element['slideelementscaledesktop'] ) ? esc_attr( $slide_element['slideelementscaledesktop'] ) : ''; ?>" placeholder="1">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Left (X/C*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementleftdesktop_<?php esc_attr( $no ); ?>" name="slideelementleftdesktop[]" value="<?php echo isset( $slide_element['slideelementleftdesktop'] ) ? esc_attr( $slide_element['slideelementleftdesktop'] ) : ''; ?>">
	                                        </div>
	                                        <div class="col-lg-3 qodef-slide-element-custom-only"<?php if ( ! $custom_positions ) { ?> style="display:none"<?php } ?>>
	                                            <em class="qodef-field-description"><?php esc_html_e( 'Relative position - Top (Y/D*100)', 'moments' ); ?></em>
	                                            <input type="text" class="form-control qodef-input qodef-form-element" id="slideelementtopdesktop_<?php esc_attr( $no ); ?>" name="slideelementtopdesktop[]" value="<?php echo isset( $slide_element['slideelementtopdesktop'] ) ? esc_attr( $slide_element['slideelementtopdesktop'] ) : ''; ?>">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div><!-- close div.qodef-section-content -->
	                        </div><!-- close div.container-fluid -->
	                    </div>
	                </div>
	            </div>
				<?php
				$no ++;
			}
		}
		?>

        <div class="qodef-slide-element-add">
            <a class="qodef-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( ' Add New Item', 'moments' ); ?></a>


            <a class="qodef-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'moments' ); ?></a>
        </div>


		<?php

	}
}


/*
   Class: MomentsQodefHolderFrameScheme
   A class that initializes elements for Slider
*/

class MomentsQodefHolderFrameScheme implements iMomentsQodefRender {
	private $label;
	private $description;


	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render( $factory ) {
		?>

        <div class="qodef-slide-elements-holder-frame-scheme">
            <img src="<?php echo esc_url( QODE_ASSETS_ROOT . '/img/holder-frame-scheme.png' ); ?>"></div>

		<?php

	}
}

class MomentsQodefRepeater implements iMomentsQodefRender {
	private $label;
	private $description;
	private $name;
	private $fields;
	private $num_of_rows;
	private $button_text;

	function __construct( $fields, $name, $label = '', $description = '', $button_text = '' ) {
		global $moments_qodef_Framework;

		$this->label       = $label;
		$this->description = $description;
		$this->fields      = $fields;
		$this->name        = $name;
		$this->num_of_rows = 1;
		$this->button_text = ! empty( $button_text ) ? $button_text : 'Add New Item';

		$counter = 0;
		foreach ( $this->fields as $field ) {
			if ( ! isset( $this->fields[ $counter ]['options'] ) ) {
				$this->fields[ $counter ]['options'] = array();
			}
			if ( ! isset( $this->fields[ $counter ]['args'] ) ) {
				$this->fields[ $counter ]['args'] = array();
			}
			if ( ! isset( $this->fields[ $counter ]['hidden'] ) ) {
				$this->fields[ $counter ]['hidden'] = false;
			}
			if ( ! isset( $this->fields[ $counter ]['label'] ) ) {
				$this->fields[ $counter ]['label'] = '';
			}
			if ( ! isset( $this->fields[ $counter ]['description'] ) ) {
				$this->fields[ $counter ]['description'] = '';
			}
			if ( ! isset( $this->fields[ $counter ]['default_value'] ) ) {
				$this->fields[ $counter ]['default_value'] = '';
			}

			$moments_qodef_Framework->qodeMetaBoxes->addOption( $this->fields[ $counter ]['name'], $this->fields[ $counter ]['default_value'] );
			$counter ++;
		}
	}

	public function render( $factory, $row_fields_num = - 1 ) {
		global $post;

		$clones = array();

		if ( ! empty( $post ) ) {
			$clones = get_post_meta( $post->ID, $this->fields[0]['name'], true );
		}

		?>
        <div class="qodef-repeater-wrapper">
            <div class="qodef-repeater-fields-holder clearfix">
				<?php if ( empty( $clones ) ) { //first time
					if ( $row_fields_num === - 1 ) {
						?>
                        <div class="qodef-repeater-fields-row">
						<?php
					}
					$counter = 0;
					foreach ( $this->fields as $field ) {
						if ( $row_fields_num !== - 1 && $counter % $row_fields_num === 0 ) { ?>
                            <div class="qodef-repeater-fields-row">
							<?php
						}
						$factory->render( $field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array(
							'index' => 0,
							'value' => $field['default_value']
						) );
						$counter ++;
						if ( $row_fields_num !== - 1 && $counter % $row_fields_num === 0 ) { ?>
                            <div class="qodef-repeater-remove">
                                <a class="qodef-clone-remove" href="#"><i class="fa fa-times"></i></a></div>
                            </div>
							<?php
						}
					}
					if ( $row_fields_num === - 1 ) {
						?>
                        <div class="qodef-repeater-remove">
                            <a class="qodef-clone-remove" href="#"><i class="fa fa-times"></i></a></div>
                        </div>
						<?php
					}
				} else {
					$j      = 0;
					$index  = 0;
					$values = array();
					foreach ( $this->fields as $field ) {
						if ( $j ++ === 0 ) { // avoid unnecessary get_post_meta call
							$values[] = $clones;
						} else {
							$values[] = get_post_meta( $post->ID, $field['name'], true );
						}
					}
					while ( isset( $clones[ $index ] ) ) { // rows
						$count = 0;
						if ( $row_fields_num === - 1 ) {
							?>
                            <div class="qodef-repeater-fields-row ">
							<?php
						}
						foreach ( $this->fields as $field ) { // columns
							if ( $row_fields_num !== - 1 && $count % $row_fields_num === 0 ) { ?>
                                <div class="qodef-repeater-fields-row">
								<?php
							}

							$factory->render( $field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array(
								'index' => $index,
								'value' => $values[ $count ][ $index ]
							) );
							if ( $row_fields_num !== - 1 && $count % $row_fields_num === 0 ) { ?>
                                <div class="qodef-repeater-remove"><a class="qodef-clone-remove" href="#"><i
                                                class="fa fa-times"></i></a></div>
                                </div>
								<?php
							}
							$count ++;
						}
						if ( $row_fields_num === - 1 ) {
							?>
                            <div class="qodef-repeater-remove">
                                <a title="<?php esc_html_e( 'Remove section', 'moments' ); ?>" class="qodef-clone-remove" href="#">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                            </div>
							<?php
						}
						++ $index;
					}
					$this->num_of_rows = $index;
				}
				?>
            </div>
            <div class="qodef-repeater-add">
                <a class="qodef-clone btn btn-sm btn-primary"
                        data-count="<?php echo esc_attr( $this->num_of_rows ) ?>"
                        href="#"><?php echo esc_html( $this->button_text ); ?></a>
            </div>
        </div>


		<?php

	}
}