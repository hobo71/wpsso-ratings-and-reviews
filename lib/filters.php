<?php
/**
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2017-2019 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'WpssoRarFilters' ) ) {

	class WpssoRarFilters {

		protected $p;

		public function __construct( &$plugin ) {

			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$this->p->util->add_plugin_filters( $this, array( 
				'get_defaults' => 1,
				'og'           => 2,
			), 1000 );

			if ( is_admin() ) {
				$this->p->util->add_plugin_filters( $this, array( 
					'messages_tooltip' => 2,
				) );
			}
		}

		public function filter_get_defaults( $def_opts ) {

			/**
			 * Add options using a key prefix array and post type names.
			 */
			$def_opts = $this->p->util->add_ptns_to_opts( $def_opts, array(
				'rar_add_to' => 0,	// Rating Form for Post Types.
			) );

			return $def_opts;
		}

		/**
		 * Use the 'og' filter instead of 'og_seed' to get the og:type meta tag value.
		 */
		public function filter_og( array $mt_og, array $mod ) {

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			if ( ! $mod[ 'is_post' ] || ! $mod[ 'id' ] ) {	// make sure we have a valid post id
				return $mt_og;
			} 
			
			if ( ! WpssoRarComment::is_rating_enabled( $mod[ 'id' ] ) ) {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'post id ' . $mod[ 'id' ] . ' ratings disabled' );
				}

				return $mt_og;
			}

			$og_type = $mt_og[ 'og:type' ];

			if ( apply_filters( $this->p->lca . '_og_add_mt_rating', true, $mod ) ) {	// Enabled by default.

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'add rating meta tags is true' );
				}

				$average_rating = WpssoRarComment::get_average_rating( $mod[ 'id' ] );
				$rating_count   = WpssoRarComment::get_rating_count( $mod[ 'id' ] );
				$review_count   = WpssoRarComment::get_review_count( $mod[ 'id' ] );

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'average rating = ' . $average_rating );
					$this->p->debug->log( 'rating count = ' . $rating_count );
					$this->p->debug->log( 'review count = ' . $review_count );
				}

				if ( empty( $average_rating ) ) {

					if ( $this->p->debug->enabled ) {
						$this->p->debug->log( 'post id ' . $mod[ 'id' ] . ' average rating is empty' );
					}

				} elseif ( empty( $rating_count ) && empty( $review_count ) ) {

					if ( $this->p->debug->enabled ) {
						$this->p->debug->log( 'post id ' . $mod[ 'id' ] . ' rating and review counts empty' );
					}

				} else {

					if ( $this->p->debug->enabled ) {
						$this->p->debug->log( 'adding average rating meta tags for post id ' . $mod[ 'id' ] );
					}

					$mt_og[ $og_type . ':rating:average' ] = number_format( (float) $average_rating, 2, '.', '' );
					$mt_og[ $og_type . ':rating:count' ]   = $rating_count;
					$mt_og[ $og_type . ':rating:worst' ]   = 1;
					$mt_og[ $og_type . ':rating:best' ]    = 5;
					$mt_og[ $og_type . ':review:count' ]   = $review_count;
				}

			} elseif ( $this->p->debug->enabled ) {
				$this->p->debug->log( 'add rating meta tags is false' );
			}

			if ( apply_filters( $this->p->lca . '_og_add_mt_reviews', false, $mod ) ) {	// Disabled by default.

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'add review meta tags is true' );
				}

				$mt_og[ $og_type . ':reviews' ] = $mod[ 'obj' ]->get_og_type_reviews( $mod[ 'id' ], $og_type, 'rating' );

			} elseif ( $this->p->debug->enabled ) {
				$this->p->debug->log( 'add review meta tags is false' );
			}

			return $mt_og;
		}

		public function filter_messages_tooltip( $text, $msg_key ) {

			if ( strpos( $msg_key, 'tooltip-rar_' ) !== 0 ) {
				return $text;
			}

			switch ( $msg_key ) {

				case 'tooltip-rar_add_to':	// Rating Form for Post Types.

					$text = __( 'You can choose to enable or disable ratings by default for each public post type.', 'wpsso-ratings-and-reviews' ) . ' ';

					$text .= sprintf( __( 'When editing a post (page, or custom post type), an "%1$s" option is also available to enable or disable ratings for that specific webpage.', 'wpsso-ratings-and-reviews' ), __( 'Enable ratings and reviews', 'wpsso-ratings-and-reviews' ) );

					break;

				case 'tooltip-rar_rating_required':	// Rating Required for Review.

					$text = __( 'Force a reviewer to select a rating before submitting their review (enabled by default).', 'wpsso-ratings-and-reviews' );

					break;

				case 'tooltip-rar_star_color_selected':	// Selected Star Rating Color.

					$text = __( 'A color for selected stars representing the rating.', 'wpsso-ratings-and-reviews' );

					break;

				case 'tooltip-rar_star_color_default':	// Unselected Star Rating Color.

					$text = __( 'A default color for unselected stars.', 'wpsso-ratings-and-reviews' );

					break;

				case 'tooltip-rar_add_5_star_rating':	// Add 5 Star Rating If No Rating.

					$text .= __( 'When this option is enabled, and a rating for the webpage content is NOT available, then a generic 5 star rating from the site organization is added to the main Schema type markup.', 'wpsso-schema-json-ld' ) . ' ';

					break;
			}

			return $text;
		}
	}
}
