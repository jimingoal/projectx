import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

import '../env.sample.dart';
import '../models/student.dart';
import '../widgets/form.dart';

class Edit extends StatefulWidget {
  final Student? student;
  const Edit({Key? key, this.student}) : super(key: key);

  @override
  _EditState createState() => _EditState();
}

class _EditState extends State<Edit> {
  // This is for form validations.
  final formKey = GlobalKey<FormState>();

  // This is for text onChange.
  late TextEditingController nameController;
  late TextEditingController ageController;

  @override
  void initState() {
    nameController = TextEditingController(text: widget.student?.name);
    ageController = TextEditingController(text: widget.student?.age.toString());
    super.initState();
  }

  // Http post request.
  Future editStudent() async => await http.post(
        Uri.parse("${Env.URL_PREFIX}/update.php"),
        body: {
          "id": widget.student?.id.toString(),
          "name": nameController.text,
          "age": ageController.text,
        },
      );

  void _onConfirm(context) async {
    var response = await editStudent();

    Navigator.of(context).pushNamedAndRemoveUntil('/', (route) => false);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Edit'),
      ),
      bottomNavigationBar: BottomAppBar(
        child: ElevatedButton(
          child: Text('CONFIRM'),
          style: ButtonStyle(
            backgroundColor: MaterialStateProperty.all<Color>(Colors.blue),
          ),
          onPressed: () => _onConfirm(context),
        ),
      ),
      body: Container(
        height: double.infinity,
        padding: EdgeInsets.all(20),
        child: Center(
          child: Padding(
            padding: EdgeInsets.all(12),
            child: AppForm(
                formKey: formKey,
                nameController: nameController,
                ageController: ageController),
          ),
        ),
      ),
    );
  }
}
