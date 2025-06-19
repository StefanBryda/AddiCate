extends CharacterBody2D

@export var speed = 800
@export var animation_speed = 7.0 

var is_facing_right = true
var animation_progress = 0.0

func _ready():
	update_animation()

func get_input():
	var input_direction = Input.get_vector("ui_left", "ui_right", "ui_up", "ui_down")
	velocity = input_direction * speed
	
	if input_direction.x < 0 && is_facing_right:
		is_facing_right = false
		update_animation()
	elif input_direction.x > 0 && !is_facing_right:
		is_facing_right = true
		update_animation()
	
	animation_progress += animation_speed * get_process_delta_time()
	$AnimatedSprite2D.frame = int(animation_progress) % 3 

func update_animation():
	var anim_name = "right_walk" if is_facing_right else "left_walk"
	$AnimatedSprite2D.play(anim_name)
	$AnimatedSprite2D.frame = int(animation_progress) % 3

func _physics_process(_delta):
	get_input()
	move_and_slide()
